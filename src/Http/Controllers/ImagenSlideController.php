<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Common\ImagenSlide;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ImagenSlideController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ImagenSlide::paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	$imagenSlide = ImagenSlide::create([
    		"link" => $request->input('link'),
    		"descripcion" => $request->input('descripcion'),
    		"titulo" => $request->input('titulo'),
    		"tipo_slide" => $request->input('tipo_slide'),
    		"imagen" => $request->input('imagen'),
    		"subtitulo" => $request->input('subtitulo')
    	]);
    	

    	return redirect(route("api.imagen-slide.show" , $imagenSlide));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImagenSlide $imagen_slide)
    {

		$imagenData = ImagenSlide::destroy($imagen_slide->id);	
		return redirect(route("api.imagen-slide.index"));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ImagenSlide $imagen_slide)
    {
        return [ 'data' => $imagen_slide ];
    }

}
