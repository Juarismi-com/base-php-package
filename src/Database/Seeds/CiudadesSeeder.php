<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Juarismi\Base\Models\Common\Ciudad;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudades = [
        	[ 
				'idprovincia' => 1, 
				'codigo' => '101',
				'nombre' => 'Belen', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 1, 
				'codigo' => '102',
				'nombre' => 'Concepcion', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 1, 
				'codigo' => '103',
				'nombre' => 'Horqueta', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 1, 
				'codigo' => '104',
				'nombre' => 'Loreto', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 1, 
				'codigo' => '105',
				'nombre' => 'Paso Barreto', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 1, 
				'codigo' => '106',
				'nombre' => 'Paso Mbutu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 1, 
				'codigo' => '107',
				'nombre' => 'Puerto Fonciere', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 1, 
				'codigo' => '108',
				'nombre' => 'San Carlos', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 1, 
				'codigo' => '109',
				'nombre' => 'San Lazaro', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 1, 
				'codigo' => '110',
				'nombre' => 'Valle Mi', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 1, 
				'codigo' => '111',
				'nombre' => 'Yby Yau', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '201',
				'nombre' => '25 de Diciembre', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '202',
				'nombre' => 'Antequera', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '203',
				'nombre' => 'Chore', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '204',
				'nombre' => 'Colonia Friesland', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '205',
				'nombre' => 'Colonia Navidad', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '206',
				'nombre' => 'Colonia Volendam', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '207',
				'nombre' => 'General Aquino', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '208',
				'nombre' => 'General Resquin', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '209',
				'nombre' => 'Guayaibi', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '210',
				'nombre' => 'Itacurubi', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '211',
				'nombre' => 'Lima', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '212',
				'nombre' => 'Nueva Germania', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '213',
				'nombre' => 'Puerto Rosario', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '214',
				'nombre' => 'Puerto Ybapobo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '215',
				'nombre' => 'San Estanislao', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '216',
				'nombre' => 'San Jose del Rosario', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '217',
				'nombre' => 'San Pablo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '218',
				'nombre' => 'San Pedro', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '219',
				'nombre' => 'Tacuati', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '220',
				'nombre' => 'Union', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '221',
				'nombre' => 'Villa del Rosario', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '222',
				'nombre' => 'Yataity del Norte', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '301',
				'nombre' => 'Alfonso Tranquera', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '302',
				'nombre' => 'Altos', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '303',
				'nombre' => 'Arroyos y Esteros', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '304',
				'nombre' => 'Atyra', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '305',
				'nombre' => 'Caacupe', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '306',
				'nombre' => 'Caraguatay', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '307',
				'nombre' => 'Col. Gral. Bernardino Caballero', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '308',
				'nombre' => 'Compañia San Antonio', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '309',
				'nombre' => 'Emboscada', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '310',
				'nombre' => 'Eusebio Ayala', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '311',
				'nombre' => 'Isla Pucu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '312',
				'nombre' => 'Itacurubi de la Cordillera', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '313',
				'nombre' => 'Itapiru', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '314',
				'nombre' => 'Juan de Mena', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '315',
				'nombre' => 'Loma Grande', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '316',
				'nombre' => 'Mbocayaty del Yhaguy', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '317',
				'nombre' => 'Nueva Colombia', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '318',
				'nombre' => 'Piribebuy', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '319',
				'nombre' => 'Primero de Marzo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '320',
				'nombre' => 'San Bernardino', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '321',
				'nombre' => 'San Jose Obrero', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '322',
				'nombre' => 'Santa Elena', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '323',
				'nombre' => 'Tobati', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '324',
				'nombre' => 'Valenzuela', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 3, 
				'codigo' => '325',
				'nombre' => 'Yaguarete Cua', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '401',
				'nombre' => 'Barrio Estacion', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '402',
				'nombre' => 'Borja', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '403',
				'nombre' => 'Capitan Mauricio J. Troche', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '404',
				'nombre' => 'Colonia Carlos Pfannl', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '405',
				'nombre' => 'Colonia San Roque Gonzalez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '406',
				'nombre' => 'Coronel Martinez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '407',
				'nombre' => 'Dr. Bottrell', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '408',
				'nombre' => 'Feliz Perez Cardozo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '409',
				'nombre' => 'Gral. Eugenio A. Garay', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '410',
				'nombre' => 'Independencia', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '411',
				'nombre' => 'Itape', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '412',
				'nombre' => 'Iturbe', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '413',
				'nombre' => 'Jose Fasardi', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '414',
				'nombre' => 'Mbocayaty', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '415',
				'nombre' => 'Natalicio Talavera', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '416',
				'nombre' => 'Ñumi                ', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '417',
				'nombre' => 'Paso Yobay', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '418',
				'nombre' => 'Pindoyu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '419',
				'nombre' => 'San Salvador', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '420',
				'nombre' => 'Tebicuary', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '421',
				'nombre' => 'Villarrica', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 4, 
				'codigo' => '422',
				'nombre' => 'Yataity', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '501',
				'nombre' => '3 de Febrero', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '502',
				'nombre' => 'Caaguazu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '503',
				'nombre' => 'Carayao', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '504',
				'nombre' => 'Cecilio Baez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '505',
				'nombre' => 'Colonia Genaro Romero', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '506',
				'nombre' => 'Coronel Oviedo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '507',
				'nombre' => 'Dr. Jose E. Estigarribia', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '508',
				'nombre' => 'Dr. Juan Manuel Frutos', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '509',
				'nombre' => 'Jose Domingo Ocampos', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '510',
				'nombre' => 'La Pastora', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '511',
				'nombre' => 'Mcal. Francisco Solano Lopez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '512',
				'nombre' => 'Nueva Australia', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '513',
				'nombre' => 'Nueva Londres', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '514',
				'nombre' => 'R.I. 3 Corrales', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '515',
				'nombre' => 'Raul A. Oviedo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '516',
				'nombre' => 'Repatriacion', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '517',
				'nombre' => 'San Antonio Cordillera', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '518',
				'nombre' => 'San Joaquin', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '519',
				'nombre' => 'San Jose de los Arroyos', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '520',
				'nombre' => 'Santa Rosa del Mbutu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '521',
				'nombre' => 'Simon Bolivar', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 5, 
				'codigo' => '522',
				'nombre' => 'Yhu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '201',
				'nombre' => 'Abai', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '602',
				'nombre' => 'Buena Vista', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '603',
				'nombre' => 'Caazapa', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '604',
				'nombre' => 'Col. Mayor Nicolas Arguello', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '605',
				'nombre' => 'Col. San Cosme', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '606',
				'nombre' => 'Compañia San Francisco', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '607',
				'nombre' => 'Dr. Moises Bertoni', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '608',
				'nombre' => 'Estacion Gral. Patricio Colman', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '609',
				'nombre' => 'Estacion Yuty', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '610',
				'nombre' => 'Gral. Higinio Morinigo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '611',
				'nombre' => 'Isla Saca', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '612',
				'nombre' => 'Maciel', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '613',
				'nombre' => 'San Juan Nepomuceno', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '614',
				'nombre' => 'Santa Barbara', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '615',
				'nombre' => 'Santa Luisa', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '616',
				'nombre' => 'Santa Rosa de Lima', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '617',
				'nombre' => 'Tabai', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '618',
				'nombre' => 'Yacubo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '619',
				'nombre' => 'Yegros', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 6, 
				'codigo' => '620',
				'nombre' => 'Yuty', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '701',
				'nombre' => 'Alto Vera', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '702',
				'nombre' => 'Barrio San Roque', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '703',
				'nombre' => 'Bella Vista', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '704',
				'nombre' => 'Cambyreta', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '705',
				'nombre' => 'Capitan Meza', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '706',
				'nombre' => 'Capitan Miranda', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '707',
				'nombre' => 'Carlos Antonio Lopez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '708',
				'nombre' => 'Carmen del Parana', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '709',
				'nombre' => 'Centro de Fronteras', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '710',
				'nombre' => 'Colonia Federico Chavez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '711',
				'nombre' => 'Colonia Samu-u', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '712',
				'nombre' => 'Colonia Triunfo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '713',
				'nombre' => 'Coronel Bogado', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '714',
				'nombre' => 'Curuñai', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '715',
				'nombre' => 'Edelira', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '716',
				'nombre' => 'Encarnacion', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '717',
				'nombre' => 'Fram', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '718',
				'nombre' => 'General Artigas', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '719',
				'nombre' => 'General Delgado', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '720',
				'nombre' => 'Hohenau', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '721',
				'nombre' => 'Isla Alta', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '722',
				'nombre' => 'Jesus', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '723',
				'nombre' => 'Jose L. Oviedo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '724',
				'nombre' => 'La Paz', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '725',
				'nombre' => 'Mayor Julio Otaño', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '726',
				'nombre' => 'Natalio', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '727',
				'nombre' => 'Nueva Alborada', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '728',
				'nombre' => 'Obligado', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '729',
				'nombre' => 'Pirapo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '730',
				'nombre' => 'San Cosme y Damian', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '731',
				'nombre' => 'San Dionisio', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '732',
				'nombre' => 'San Juan del Parana', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '733',
				'nombre' => 'San Luis del Parana', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '734',
				'nombre' => 'San Pedro del Parana', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '735',
				'nombre' => 'San Rafael del Parana', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '736',
				'nombre' => 'Tomas Romero Pereira', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '737',
				'nombre' => 'Trinidad', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 7, 
				'codigo' => '738',
				'nombre' => 'Yatytay', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '801',
				'nombre' => 'Ayolas', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '802',
				'nombre' => 'Colonia Alejo Garcia', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '803',
				'nombre' => 'Itayuru', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '804',
				'nombre' => 'San Ignacio', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '805',
				'nombre' => 'San Juan Bautista', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '806',
				'nombre' => 'San Miguel', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '807',
				'nombre' => 'San Patricio', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '808',
				'nombre' => 'San Ramon', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '809',
				'nombre' => 'Santa Maria', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '810',
				'nombre' => 'Santa Rosa', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '811',
				'nombre' => 'Santiago', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '812',
				'nombre' => 'Villa Florida', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '813',
				'nombre' => 'Yabebyry', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 8, 
				'codigo' => '814',
				'nombre' => 'Yacuti', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '901',
				'nombre' => 'Acahay', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '902',
				'nombre' => 'Caapucu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '903',
				'nombre' => 'Caballero', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '904',
				'nombre' => 'Carapegua', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '905',
				'nombre' => 'Cerro Leon', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '906',
				'nombre' => 'Col. Gral. Cesar Barrientos', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '907',
				'nombre' => 'Colonia Santa Isabel', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '908',
				'nombre' => 'Escobar', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '909',
				'nombre' => 'La Colmena', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '910',
				'nombre' => 'Mbuyapey', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '911',
				'nombre' => 'Paraguari', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '912',
				'nombre' => 'Pirayu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '913',
				'nombre' => 'Quiindy', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '914',
				'nombre' => 'Quyquyho', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '915',
				'nombre' => 'San Roque Gonzalez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '916',
				'nombre' => 'Sapucai', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '917',
				'nombre' => 'Tebicuary-Mi', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '918',
				'nombre' => 'Valle Apua', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '919',
				'nombre' => 'Yaguaron', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '920',
				'nombre' => 'Ybycui', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 9, 
				'codigo' => '921',
				'nombre' => 'Ybytymi', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1001',
				'nombre' => 'Ciudad del Este', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1002',
				'nombre' => 'Domingo Martinez de Irala', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1003',
				'nombre' => 'Dr. Juan Leon Mallorquin', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1004',
				'nombre' => 'Hernandarias', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1005',
				'nombre' => 'Ytaquyry', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1006',
				'nombre' => 'Juan E. Oleary', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1007',
				'nombre' => 'Los Cedrales', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1008',
				'nombre' => 'Mbaracayu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1009',
				'nombre' => 'Minga Guazu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1010',
				'nombre' => 'Minga Pora', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1011',
				'nombre' => 'Ñacunday            ', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1012',
				'nombre' => 'Naranjal', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1013',
				'nombre' => 'Presidente Franco', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1014',
				'nombre' => 'Puerto Bertoni', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1015',
				'nombre' => 'San Alberto', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1016',
				'nombre' => 'San Cristobal', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1017',
				'nombre' => 'Santa Rita', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1018',
				'nombre' => 'Santa Rosa del Monday', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 10,
				'codigo' =>  '1019',
				'nombre' => 'Yguazu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1101',
				'nombre' => 'Asuncion', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1102',
				'nombre' => 'Aregua', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1103',
				'nombre' => 'Ñemby                ', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1104',
				'nombre' => 'Capiata', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1005',
				'nombre' => 'Fernando de la Mora', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1106',
				'nombre' => 'Guarambare', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1107',
				'nombre' => 'Ita', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1108',
				'nombre' => 'Itaugua', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1109',
				'nombre' => 'J. Augusto Saldivar', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1110',
				'nombre' => 'Lambare', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1111',
				'nombre' => 'Limpio', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '112',
				'nombre' => 'Loma Pyta', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1113',
				'nombre' => 'Luque', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1114',
				'nombre' => 'Mariano Roque Alonso', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '115',
				'nombre' => 'Nueva Italia', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1116',
				'nombre' => 'San Antonio', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1117',
				'nombre' => 'San Lorenzo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1118',
				'nombre' => 'Villa Elisa', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1119',
				'nombre' => 'Villeta', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1120',
				'nombre' => 'Ypacarai', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 11,
				'codigo' =>  '1121',
				'nombre' => 'Ypane', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1201',
				'nombre' => 'Alberdi', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1202',
				'nombre' => 'Barrio Burrerita', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1203',
				'nombre' => 'Barrio Obrero', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1204',
				'nombre' => 'Cerrito', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1205',
				'nombre' => 'Desmochado', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1206',
				'nombre' => 'Gral. Jose Eduvigis Diaz', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1207',
				'nombre' => 'Guazu Cua', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1208',
				'nombre' => 'Humaita', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1209',
				'nombre' => 'Isla Umbu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1210',
				'nombre' => 'Laureles', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1211',
				'nombre' => 'Mayor Jose de J. Martinez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1212',
				'nombre' => 'Paso de Patria', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1213',
				'nombre' => 'Pilar', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1214',
				'nombre' => 'San Juan B. de Ñeembucu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1215',
				'nombre' => 'Tacuaras', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1216',
				'nombre' => 'Villa Franca', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1217',
				'nombre' => 'Villa Oliva', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 12,
				'codigo' =>  '1218',
				'nombre' => 'Villabin', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 13,
				'codigo' =>  '1301',
				'nombre' => 'Bella Vista', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 13,
				'codigo' =>  '1302',
				'nombre' => 'Capitan Bado', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 13,
				'codigo' =>  '1303',
				'nombre' => 'Pedro Juan Caballero', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1401',
				'nombre' => 'Colonia Anahi', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1402',
				'nombre' => 'Colonia Catuete', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1403',
				'nombre' => 'Corpus Christi', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1404',
				'nombre' => 'Curuguaty', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1405',
				'nombre' => 'Gral. Francisco Alvarez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1406',
				'nombre' => 'Itarara', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1407',
				'nombre' => 'La Paloma', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1408',
				'nombre' => 'Nueva Esperanza', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1409',
				'nombre' => 'Santo del Guaira', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1410',
				'nombre' => 'Ygatimi', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 14,
				'codigo' =>  '1411',
				'nombre' => 'Ype Jhu', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1501',
				'nombre' => 'Benjamin Aceval', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1502',
				'nombre' => 'Chaco-i', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1503',
				'nombre' => 'Colonia Falcon', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1504',
				'nombre' => 'Dr. Francia - Beteretecue', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1505',
				'nombre' => 'Fortin Esteban Martinez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1506',
				'nombre' => 'Fortin General Bruguez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1507',
				'nombre' => 'Fortin General Caballero', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1508',
				'nombre' => 'Nanawa', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1509',
				'nombre' => 'Pozo Colorado', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1510',
				'nombre' => 'Puerto Pinasco', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 15,
				'codigo' =>  '1511',
				'nombre' => 'Villa Hayes', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 16,
				'codigo' =>  '1601',
				'nombre' => 'Bahia Negra', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 16,
				'codigo' =>  '1602',
				'nombre' => 'Fuerte Olimpo', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 16,
				'codigo' =>  '1603',
				'nombre' => 'Isla Margarita', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 16,
				'codigo' =>  '1604',
				'nombre' => 'La Victoria', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 16,
				'codigo' =>  '1605',
				'nombre' => 'Lagerenza', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 16,
				'codigo' =>  '1606',
				'nombre' => 'Puerto Guarani', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 16,
				'codigo' =>  '1607',
				'nombre' => 'Puerto la Esperanza', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 17,
				'codigo' =>  '1701',
				'nombre' => 'Capitan Joel Estigarribia', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 17,
				'codigo' =>  '1702',
				'nombre' => 'Colonia Neuland', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 17,
				'codigo' =>  '1703',
				'nombre' => 'Dr. Pedro P. Peña    ', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 17,
				'codigo' =>  '1704',
				'nombre' => 'Filadelfia', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 17,
				'codigo' =>  '1705',
				'nombre' => 'Gral. Eugencio A. Garay', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 17,
				'codigo' =>  '1706',
				'nombre' => 'Loma Plata', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 17,
				'codigo' =>  '1707',
				'nombre' => 'Mariscal Estigarribia', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 17,
				'codigo' =>  '1708',
				'nombre' => 'Teniente Primero Irala Fernandez', 
				'latitud' => '0', 
				'longitud' => '0' 
			],
			[ 
				'idprovincia' => 2, 
				'codigo' => '223',
				'nombre' => 'CAPIIBARY', 
				'latitud' => '0', 
				'longitud' => '0'
			]
        ];

        Ciudad::truncate();
        foreach ($ciudades as $ciudad) {
        	Ciudad::create($ciudad);
        }
        
    }
}
