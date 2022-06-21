<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Common\Imagen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Image;
use Juarismi\Base\Http\Resources\Imagen\ImagenResource;

class ImagenController extends AppController
{
    

    public function __construct(){
        $this->middleware('cors');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Imagen::orderBy('updated_at', 'desc')->paginate(20);
    }



    /**
     * Guarda unas imagenes con tamanños de alto, 
     * - Mediana
     * - Pequeña 
     */
    public function store(Request $request){
        $width = $request->input('width');
        $height = $request->input('height');


        if($request->hasFile('imagen')) {

            $imagenDataRequest = $request->file('imagen');
            $imagenPath = $imagenDataRequest->store('imagenes', 'public');
            $imagePathWithStorage = "storage/".$imagenPath;

            
            // Copia de imagenes
            $smallImagePath = $this->createImagen("__small__", $imagePathWithStorage);
            $mediumImagePath = $this->createImagen("__medium__", $imagePathWithStorage);



            $customImagePath = NULL;
            if (isset($width)){
                $customImagePath = $this->createImagen(
                    "__W=".$width."__", $imagePathWithStorage
                );
                $this->resizeImage($customImagePath, $width);
            } else if (isset($height)){
                $customImagePath = $this->createImagen(
                    "__H=".$height."__", $imagePathWithStorage
                );
                $this->resizeImage($customImagePath, NULL, $height);
            }

            // Actualzar dimensiones de archivos copiados / generados
            $this->resizeImage($smallImagePath, 200);
            $this->resizeImage($mediumImagePath, 900);


            $imagen = new Imagen;
            $imagen->path = $imagePathWithStorage;
            $imagen->imagen_pequenha = $smallImagePath;
            $imagen->imagen_mediana = $mediumImagePath;
            $imagen->imagen_custom = $customImagePath;
            $imagen->save();

            return [
                "type_message" => "success",
                "message" => "Imagen asignada correctamente", 
                "data" => new ImagenResource($imagen)
            ];
        }

    }



    /**
     * Redimensiona una imagen/path existente
     * a un tamanho x
     */
    public function resizeExistImage(Request $request){
        $width = $request->input('width');
        $height = $request->input('height');
    }



    
    public function storeBase64(Request $request){
        
        $base64_image = $request->input('imagen');
        
        $data = base64_decode($base64_image);
        Storage::disk('public')->put("test.png", $data);
            
        return $base64_image;
        

    }


    /**
     * 
     * Copia una imagen y asigna un nuevo nombre
     * @param string $middleName - nombre del medio
     * @param string $imagenPath - donde buscar el archivo
     * 
     * @return bool|string - Retorna la nueva ruta o false en caso de 
     * no haberse generado la imagen
     */
    protected function createImagen($middleName = '', $imagenPath){
        $fileSystem = new Filesystem();
        $imagenExiste = $fileSystem->exists($imagenPath);

        
        if ($imagenExiste){
            $imagenName = $fileSystem->name($imagenPath);
            $imagenBaseName = $fileSystem->basename($imagenPath);
            $imagenExtension = $fileSystem->extension($imagenPath);


            $newImagen = $imagenName."$middleName.".$imagenExtension;
            $newPath = "storage/imagenes/thumbnails/".$newImagen;

            
            if ($fileSystem->copy($imagenPath, $newPath))
                return $newPath;
        }

        return false;
        
    }


    /**
     * Redimensiona la imagen, en base al path pasado
     * 
     * @param bool|string $path - ruta de la imagen, si es false, no hay ruta
     * @param number $width
     * @param number $height
     * 
     * @return Image|bool Retorna la imagen redimensionada o un valor falso,
     * en caso de no haber podido redimensionar la imagen
     * 
     */
    protected function resizeImage($path = false, $width = NULL, $height = NULL)
    {

        if ($path != false){
            $img = Image::make($path)->resize($width, $height, 
                function($constraint) {
                    $constraint->aspectRatio();
                }   
            );
            $img->save($path);    
            return $img;
        } else {
            return false;
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $imagen)
    {
        return [ 'data' => $imagen ];
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        $imagenData = [
            "titulo" => $request->input("titulo"),
            "descripcion" => $request->input("descripcion"),
            "estado" => $request->input("estado"),
        ];

        $imagen->update($imagenData);
        return [
            "type_message" => "success",
            "data" => $imagen,
            "message" => "Imagen Actualizada correctamente"
        ];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagen $imagen)
    {


        $path = str_replace("storage/","",$imagen->path);
        $smallImagePath = str_replace("storage/","",$imagen->imagen_pequenha);
        $mediumImagePath = str_replace("storage/","",$imagen->imagen_mediana);
        $customImagePath = str_replace("storage/","",$imagen->imagen_custom);

        //$imagen->delete();
        $deleteImages =  Storage::disk('public')->delete(
            $path,
            $smallImagePath,
            $mediumImagePath,
            $customImagePath
        );
        
        $imagen->delete();

        return [
            "data" => $imagen,
            "message" => "Imagen eliminada correctamente"
        ];

    }



    /**
     * Elimina las imagenes que no se encuentran almacenas en el servidor,
     * es decir el path esta disponible pero el archivo no
     */
    public function removeInvalidImage(){
        $imageList = Image::all();

        foreach ($imageList as $imageTmp) {
            var_dump($imageTmp);
        }

    }


}
