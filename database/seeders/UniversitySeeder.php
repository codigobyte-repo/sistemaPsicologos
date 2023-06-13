<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universidades = [
            'NACIONAL DE MAR DEL PLATA',
            'NACIONAL DE ROSARIO',
            'PONTIFICIA SANTA MARIA DE LOS BUENOS AIRES',
            'PONTIFICIA UNIVERSIDAD JAVERIANA (COLOMBIA)',
            'NACIONAL DE SAN LUIS',
            'PROVINCIAL DE MAR DEL PLATA',
            'NACIONAL DE TUCUMAN',
            'RAFAEL URDANETA',
            'NACIONAL DEL COMAHUE',
            'NACIONAL DEL LITORAL',
            'RICARDO PALMA DEL PERU',
            'DEL SALVADOR',
            'SANTO TOMAS COLOMBIA',
            'PILOTO DE COLOMBIA',
            'SIGLO XXI',
            'PONTIFICA CATOLICA ARGENTINA',
            'PONTIFICA CATOLICA DE PERU',
            'STO TOME',
            'PONTIFICA CATOLICA RIO GRDE DO SUL',
            'UADE',
            'UAI',
            'PONTIFICIA BOLIVARIANA',
            'UCA',
            'PONTIFICIA CAMILLAS (ESPAÑA)',
            'UCES',
            'UNIVERSIDAD COOPERATIVA DE COLOMBIA',
            'ANTIOQUIA ARGENTINA',
            'AUTOCTONA DE MEXICO',
            'CAECE',
            'CATOLICA ARGENTINA',
            'CATOLICA DE COLUMBIA',
            'CATOLICA DE LA PLATA',
            'CATOLICA DE PERU',
            'INSTITUTO UNIVERSITARIO ITALIANO DE ROSARIO',
            'ADVENTISTA DEL PLATA',
            'AUSTRAL',
            'CATOLICA DE BUENOS AIRES',
            'DE DEUSTO',
            'DE PALERMO',
            'DE LA CUENCA DEL PLATA',
            'NACIONAL AUTONOMA DE MEXICO',
            'NACIONAL DE ASUNCION',
            'NACIONAL DE BUENOS AIRES (UBA)',
            'NACIONAL DE CHILE',
            'FAVALORO',
            'NACIONAL DE CUYO',
            'FILOS Y LETRAS BUENOS AIRES',
            'NACIONAL DE CORDOBA',
            'FMU SAO PAULO BRASIL',
            'NACIONAL DE EDUCACIÓN A DISTANCIA',
            'MUSEO SOCIAL ARGENTINO',
            'MAIMONIDES',
            'FUNDACION BARCELO',
            'DEL NORTE',
            'DE MENDOZA',
            'ANTIOQUÍA',
            'NACIONAL DE LA PLATA',
            'FUNDACION UNIVERSITARIA KONRAD LORENZ (IUNIR)',
            'DE SAN BUENAVENTURA',
            'DE LA REPUBLICA ORIENTAL DEL URUGUAY',
            'ATLANTIDA ARGENTINA',
            'ARGENTINA',
            'AUTONOMA DE ENTRE RIOS (UADER)',
            'AUTONOMA DE MADRID',
            'AUTONOMA METROPOLITANA',
            'BARCELONA',
            'BASEL (SUIZA)',
            'USAL',
            'CATOLICA ANDRES BELLO',
            'CATOLICA DE CHILE',
            'CATOLICA DE COLOMBIA',
            'CATOLICA DE CORDOBA',
            'CATOLICA DE CUYO',
            'CATOLICA DE SALTA',
            'CATOLICA DE SANTA FE',
            'CATOLICA DE SANTIAGO DE GUAYAQUIL',
            'CATOLICA DE SANTIAGO DEL ESTERO',
            'CATOLICA DE TUCUMAN',
            'CIENCIAS EMPRESARIALES Y SOCIALES',
            'COMPLUTENSE DE MADRID',
            'DE BELGRANO',
            'DE MORON',
            'DE CONGRESO MENDOZA',
            'DE FLORES',
            'DE GUADALAJARA',
            'DE LA CUENCA',
            'DEL PLATA',
            'DE LA MARINA MERCANTE',
            'DE LA REPUBLICA',
            'AUTONOMA DE BUCARAMANGA',
            'VALENCIA',
            'KENNEDY',
            'DE RIO DE JANEIRO',
            'DEL ACONCAGUA',
            'SIN REFERENCIA'
        ];
        foreach ($universidades as $universidad) {
            
            University::create([
                'nombre' => $universidad
            ]);
            
        }
    }
}
