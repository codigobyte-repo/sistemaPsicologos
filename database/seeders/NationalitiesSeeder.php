<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paises = [
            [
                'pais' => 'Afganistán',
                'nombre_excel' => 'AFGANISTAN',
            ],
            [
                'pais' => 'Albania',
                'nombre_excel' => 'ALBANIA',
            ],
            [
                'pais' => 'Argelia',
                'nombre_excel' => 'ARGELIA',
            ],
            [
                'pais' => 'Andorra',
                'nombre_excel' => 'ANDORRA',
            ],
            [
                'pais' => 'Angola',
                'nombre_excel' => 'ANGOLA',
            ],
            [
                'pais' => 'Antigua y Barbuda',
                'nombre_excel' => 'ANTIGUA Y BARBUDA',
            ],
            [
                'pais' => 'Argentina',
                'nombre_excel' => 'ARGENTINA',
            ],
            [
                'pais' => 'Armenia',
                'nombre_excel' => 'ARMENIA',
            ],
            [
                'pais' => 'Australia',
                'nombre_excel' => 'AUSTRALIA',
            ],
            [
                'pais' => 'Austria',
                'nombre_excel' => 'AUSTRIA',
            ],
            [
                'pais' => 'Azerbaiyán',
                'nombre_excel' => 'AZERBAIYAN',
            ],
            [
                'pais' => 'Bahamas',
                'nombre_excel' => 'BAHAMAS',
            ],
            [
                'pais' => 'Bahréin',
                'nombre_excel' => 'BAHREIN',
            ],
            [
                'pais' => 'Bangladesh',
                'nombre_excel' => 'BANGLADESH',
            ],
            [
                'pais' => 'Barbados',
                'nombre_excel' => 'BARBADOS',
            ],
            [
                'pais' => 'Belarús',
                'nombre_excel' => 'BELARUS',
            ],
            [
                'pais' => 'Bélgica',
                'nombre_excel' => 'BELGICA',
            ],
            [
                'pais' => 'Belice',
                'nombre_excel' => 'BELICE',
            ],
            [
                'pais' => 'Benín',
                'nombre_excel' => 'BENIN',
            ],
            [
                'pais' => 'Bhután',
                'nombre_excel' => 'BHUTAN',
            ],
            [
                'pais' => 'Bolivia',
                'nombre_excel' => 'BOLIVIA',
            ],
            [
                'pais' => 'Bosnia y Herzegovina',
                'nombre_excel' => 'BOSNIA Y HERZEGOVINA',
            ],
            [
                'pais' => 'Botswana',
                'nombre_excel' => 'BOTSWANA',
            ],
            [
                'pais' => 'Brasil',
                'nombre_excel' => 'BRASIL',
            ],
            [
                'pais' => 'Brunei',
                'nombre_excel' => 'BRUNEI',
            ],
            [
                'pais' => 'Bulgaria',
                'nombre_excel' => 'BULGARIA',
            ],
            [
                'pais' => 'Burkina Faso',
                'nombre_excel' => 'BURKINA_FASO',
            ],
            [
                'pais' => 'Burundi',
                'nombre_excel' => 'BURUNDI',
            ],
            [
                'pais' => 'Cabo Verde',
                'nombre_excel' => 'CABO VERDE',
            ],
            [
                'pais' => 'Camboya',
                'nombre_excel' => 'CAMBOYA',
            ],
            [
                'pais' => 'Camerún',
                'nombre_excel' => 'CAMERUN',
            ],
            [
                'pais' => 'Canadá',
                'nombre_excel' => 'CANADA',
            ],
            [
                'pais' => 'República Centroafricana',
                'nombre_excel' => 'REPUBLICA CENTROAFRICANA',
            ],
            [
                'pais' => 'Chad',
                'nombre_excel' => 'CHAD',
            ],
            [
                'pais' => 'Chile',
                'nombre_excel' => 'CHILE',
            ],
            [
                'pais' => 'China',
                'nombre_excel' => 'CHINA',
            ],
            [
                'pais' => 'Colombia',
                'nombre_excel' => 'COLOMBIA',
            ],
            [
                'pais' => 'Comoras',
                'nombre_excel' => 'COMORAS',
            ],
            [
                'pais' => 'Congo (Brazzaville)',
                'nombre_excel' => 'CONGO BRAZZAVILLE',
            ],
            [
                'pais' => 'Congo (Kinshasa)',
                'nombre_excel' => 'CONGO KINSHASA',
            ],
            [
                'pais' => 'Costa Rica',
                'nombre_excel' => 'COSTA RICA',
            ],
            [
                'pais' => 'Costa de Marfil',
                'nombre_excel' => 'COSTA DE MARFIL',
            ],
            [
                'pais' => 'Croacia',
                'nombre_excel' => 'CROACIA',
            ],
            [
                'pais' => 'Cuba',
                'nombre_excel' => 'CUBA',
            ],
            [
                'pais' => 'Chipre',
                'nombre_excel' => 'CHIPRE',
            ],
            [
                'pais' => 'República Checa',
                'nombre_excel' => 'REPUBLICA CHECA',
            ],
            [
                'pais' => 'Dinamarca',
                'nombre_excel' => 'DINAMARCA',
            ],
            [
                'pais' => 'Yibuti',
                'nombre_excel' => 'YIBUTI',
            ],
            [
                'pais' => 'Dominica',
                'nombre_excel' => 'DOMINICA',
            ],
            [
                'pais' => 'República Dominicana',
                'nombre_excel' => 'REPUBLICA DOMINICANA',
            ],
            [
                'pais' => 'Timor Oriental',
                'nombre_excel' => 'TIMOR ORIENTAL',
            ],
            [
                'pais' => 'Ecuador',
                'nombre_excel' => 'ECUADOR',
            ],
            [
                'pais' => 'Egipto',
                'nombre_excel' => 'EGIPTO',
            ],
            [
                'pais' => 'El Salvador',
                'nombre_excel' => 'EL SALVADOR',
            ],
            [
                'pais' => 'Guinea Ecuatorial',
                'nombre_excel' => 'GUINEA ECUATORIAL',
            ],
            [
                'pais' => 'Eritrea',
                'nombre_excel' => 'ERITREA',
            ],
            [
                'pais' => 'Estonia',
                'nombre_excel' => 'ESTONIA',
            ],
            [
                'pais' => 'Eswatini',
                'nombre_excel' => 'ESWATINI',
            ],
            [
                'pais' => 'Etiopía',
                'nombre_excel' => 'ETIOPIA',
            ],
            [
                'pais' => 'Fiji',
                'nombre_excel' => 'FIJI',
            ],
            [
                'pais' => 'Finlandia',
                'nombre_excel' => 'FINLANDIA',
            ],
            [
                'pais' => 'Francia',
                'nombre_excel' => 'FRANCIA',
            ],
            [
                'pais' => 'Gabón',
                'nombre_excel' => 'GABON',
            ],
            [
                'pais' => 'Gambia',
                'nombre_excel' => 'GAMBIA',
            ],
            [
                'pais' => 'Georgia',
                'nombre_excel' => 'GEORGIA',
            ],
            [
                'pais' => 'Alemania',
                'nombre_excel' => 'ALEMANIA',
            ],
            [
                'pais' => 'Ghana',
                'nombre_excel' => 'GHANA',
            ],
            [
                'pais' => 'Grecia',
                'nombre_excel' => 'GRECIA',
            ],
            [
                'pais' => 'Granada',
                'nombre_excel' => 'GRANADA',
            ],
            [
                'pais' => 'Guatemala',
                'nombre_excel' => 'GUATEMALA',
            ],
            [
                'pais' => 'Guinea',
                'nombre_excel' => 'GUINEA',
            ],
            [
                'pais' => 'Guinea-Bissau',
                'nombre_excel' => 'GUINEA BISSAU',
            ],
            [
                'pais' => 'Guyana',
                'nombre_excel' => 'GUYANA',
            ],
            [
                'pais' => 'Haití',
                'nombre_excel' => 'HAITI',
            ],
            [
                'pais' => 'Santa Sede',
                'nombre_excel' => 'SANTA SEDE',
            ],
            [
                'pais' => 'Honduras',
                'nombre_excel' => 'HONDURAS',
            ],
            [
                'pais' => 'Hungría',
                'nombre_excel' => 'HUNGRIA',
            ],
            [
                'pais' => 'Islandia',
                'nombre_excel' => 'ISLANDIA',
            ],
            [
                'pais' => 'India',
                'nombre_excel' => 'INDIA',
            ],
            [
                'pais' => 'Indonesia',
                'nombre_excel' => 'INDONESIA',
            ],
            [
                'pais' => 'Irán',
                'nombre_excel' => 'IRAN',
            ],
            [
                'pais' => 'Iraq',
                'nombre_excel' => 'IRAQ',
            ],
            [
                'pais' => 'Irlanda',
                'nombre_excel' => 'IRLANDA',
            ],
            [
                'pais' => 'Israel',
                'nombre_excel' => 'ISRAEL',
            ],
            [
                'pais' => 'Italia',
                'nombre_excel' => 'ITALIA',
            ],
            [
                'pais' => 'Jamaica',
                'nombre_excel' => 'JAMAICA',
            ],
            [
                'pais' => 'Japón',
                'nombre_excel' => 'JAPON',
            ],
            [
                'pais' => 'Jordania',
                'nombre_excel' => 'JORDANIA',
            ],
            [
                'pais' => 'Kazajistán',
                'nombre_excel' => 'KAZAJISTAN',
            ],
            [
                'pais' => 'Kenya',
                'nombre_excel' => 'KENYA',
            ],
            [
                'pais' => 'Kiribati',
                'nombre_excel' => 'KIRIBATI',
            ],
            [
                'pais' => 'Corea del Norte',
                'nombre_excel' => 'COREA DEL NORTE',
            ],
            [
                'pais' => 'Corea del Sur',
                'nombre_excel' => 'COREA DEL SUR',
            ],
            [
                'pais' => 'Kuwait',
                'nombre_excel' => 'KUWAIT',
            ],
            [
                'pais' => 'Kirguistán',
                'nombre_excel' => 'KIRGUISTAN',
            ],
            [
                'pais' => 'Laos',
                'nombre_excel' => 'LAOS',
            ],
            [
                'pais' => 'Letonia',
                'nombre_excel' => 'LETONIA',
            ],
            [
                'pais' => 'Líbano',
                'nombre_excel' => 'LIBANO',
            ],
            [
                'pais' => 'Lesotho',
                'nombre_excel' => 'LESOTHO',
            ],
            [
                'pais' => 'Liberia',
                'nombre_excel' => 'LIBERIA',
            ],
            [
                'pais' => 'Libia',
                'nombre_excel' => 'LIBIA',
            ],
            [
                'pais' => 'Liechtenstein',
                'nombre_excel' => 'LIECHTENSTEIN',
            ],
            [
                'pais' => 'Lituania',
                'nombre_excel' => 'LITUANIA',
            ],
            [
                'pais' => 'Luxemburgo',
                'nombre_excel' => 'LUXEMBURGO',
            ],
            [
                'pais' => 'Madagascar',
                'nombre_excel' => 'MADAGASCAR',
            ],
            [
                'pais' => 'Malawi',
                'nombre_excel' => 'MALAWI',
            ],
            [
                'pais' => 'Malasia',
                'nombre_excel' => 'MALASIA',
            ],
            [
                'pais' => 'Maldivas',
                'nombre_excel' => 'MALDIVAS',
            ],
            [
                'pais' => 'Malí',
                'nombre_excel' => 'MALI',
            ],
            [
                'pais' => 'Malta',
                'nombre_excel' => 'MALTA',
            ],
            [
                'pais' => 'Islas Marshall',
                'nombre_excel' => 'ISLAS MARSHALL',
            ],
            [
                'pais' => 'Mauritania',
                'nombre_excel' => 'MAURITANIA',
            ],
            [
                'pais' => 'Mauricio',
                'nombre_excel' => 'MAURICIO',
            ],
            [
                'pais' => 'México',
                'nombre_excel' => 'MEXICO',
            ],
            [
                'pais' => 'Micronesia',
                'nombre_excel' => 'MICRONESIA',
            ],
            [
                'pais' => 'Moldavia',
                'nombre_excel' => 'MOLDAVIA',
            ],
            [
                'pais' => 'Mónaco',
                'nombre_excel' => 'MONACO',
            ],
            [
                'pais' => 'Mongolia',
                'nombre_excel' => 'MONGOLIA',
            ],
            [
                'pais' => 'Montenegro',
                'nombre_excel' => 'MONTENEGRO',
            ],
            [
                'pais' => 'Marruecos',
                'nombre_excel' => 'MARRUECOS',
            ],
            [
                'pais' => 'Mozambique',
                'nombre_excel' => 'MOZAMBIQUE',
            ],
            [
                'pais' => 'Namibia',
                'nombre_excel' => 'NAMIBIA',
            ],
            [
                'pais' => 'Nauru',
                'nombre_excel' => 'NAURU',
            ],
            [
                'pais' => 'Nepal',
                'nombre_excel' => 'NEPAL',
            ],
            [
                'pais' => 'Países Bajos',
                'nombre_excel' => 'PAISES BAJOS',
            ],
            [
                'pais' => 'Nueva Zelanda',
                'nombre_excel' => 'NUEVA ZELANDA',
            ],
            [
                'pais' => 'Nicaragua',
                'nombre_excel' => 'NICARAGUA',
            ],
            [
                'pais' => 'Nigeria',
                'nombre_excel' => 'NIGERIA',
            ],
            [
                'pais' => 'Noruega',
                'nombre_excel' => 'NORUEGA',
            ],
            [
                'pais' => 'Omán',
                'nombre_excel' => 'OMAN',
            ],
            [
                'pais' => 'Pakistán',
                'nombre_excel' => 'PAKISTAN',
            ],
            [
                'pais' => 'Palau',
                'nombre_excel' => 'PALAU',
            ],
            [
                'pais' => 'Palestina',
                'nombre_excel' => 'PALESTINA',
            ],
            [
                'pais' => 'Panamá',
                'nombre_excel' => 'PANAMA',
            ],
            [
                'pais' => 'Papúa Nueva Guinea',
                'nombre_excel' => 'PAPUA NUEVA GUINEA',
            ],
            [
                'pais' => 'Paraguay',
                'nombre_excel' => 'PARAGUAY',
            ],
            [
                'pais' => 'Perú',
                'nombre_excel' => 'PERU',
            ],
            [
                'pais' => 'Filipinas',
                'nombre_excel' => 'FILIPINAS',
            ],
            [
                'pais' => 'Polonia',
                'nombre_excel' => 'POLONIA',
            ],
            [
                'pais' => 'Portugal',
                'nombre_excel' => 'PORTUGAL',
            ],
            [
                'pais' => 'Qatar',
                'nombre_excel' => 'QATAR',
            ],
            [
                'pais' => 'Reunión',
                'nombre_excel' => 'REUNION',
            ],
            [
                'pais' => 'Rumanía',
                'nombre_excel' => 'RUMANIA',
            ],
            [
                'pais' => 'Rusia',
                'nombre_excel' => 'RUSIA',
            ],
            [
                'pais' => 'Ruanda',
                'nombre_excel' => 'RUANDA',
            ],
            [
                'pais' => 'San Cristóbal y Nieves',
                'nombre_excel' => 'SAN CRISTOBAL Y NIEVES',
            ],
            [
                'pais' => 'Santa Lucía',
                'nombre_excel' => 'SANTA LUCIA',
            ],
            [
                'pais' => 'San Vicente y las Granadinas',
                'nombre_excel' => 'SAN VICENTE Y LAS GRANADINAS',
            ],
            [
                'pais' => 'Samoa',
                'nombre_excel' => 'SAMOA',
            ],
            [
                'pais' => 'San Marino',
                'nombre_excel' => 'SAN MARINO',
            ],
            [
                'pais' => 'Santo Tomé y Príncipe',
                'nombre_excel' => 'SANTO TOME Y PRINCIPE',
            ],
            [
                'pais' => 'Arabia Saudita',
                'nombre_excel' => 'ARABIA SAUDITA',
            ],
            [
                'pais' => 'Senegal',
                'nombre_excel' => 'SENEGAL',
            ],
            [
                'pais' => 'Serbia',
                'nombre_excel' => 'SERBIA',
            ],
            [
                'pais' => 'Seychelles',
                'nombre_excel' => 'SEYCHELLES',
            ],
            [
                'pais' => 'Singapur',
                'nombre_excel' => 'SINGAPUR',
            ],
            [
                'pais' => 'Eslovaquia',
                'nombre_excel' => 'ESLOVAQUIA',
            ],
            [
                'pais' => 'Eslovenia',
                'nombre_excel' => 'ESLOVENIA',
            ],
            [
                'pais' => 'Islas Salomón',
                'nombre_excel' => 'ISLAS SALOMON',
            ],
            [
                'pais' => 'Somalia',
                'nombre_excel' => 'SOMALIA',
            ],
            [
                'pais' => 'Sudáfrica',
                'nombre_excel' => 'SUDAFRICA',
            ],
            [
                'pais' => 'Sudán del Sur',
                'nombre_excel' => 'SUDAN DEL SUR',
            ],
            [
                'pais' => 'España',
                'nombre_excel' => 'ESPAÑA',
            ],
            [
                'pais' => 'Sri Lanka',
                'nombre_excel' => 'SRI LANKA',
            ],
            [
                'pais' => 'Sudán',
                'nombre_excel' => 'SUDAN',
            ],
            [
                'pais' => 'Surinam',
                'nombre_excel' => 'SURINAM',
            ],
            [
                'pais' => 'Suecia',
                'nombre_excel' => 'SUECIA',
            ],
            [
                'pais' => 'Suiza',
                'nombre_excel' => 'SUIZA',
            ],
            [
                'pais' => 'Siria',
                'nombre_excel' => 'SIRIA',
            ],
            [
                'pais' => 'Taiwán',
                'nombre_excel' => 'TAIWÁN',
            ],
            [
                'pais' => 'Tayikistán',
                'nombre_excel' => 'TAYIKISTAN',
            ],
            [
                'pais' => 'Tanzania',
                'nombre_excel' => 'TANZANIA',
            ],
            [
                'pais' => 'Tailandia',
                'nombre_excel' => 'TAILANDIA',
            ],
            [
                'pais' => 'Timor-Leste',
                'nombre_excel' => 'TIMOR LESTE',
            ],
            [
                'pais' => 'Togo',
                'nombre_excel' => 'TOGO',
            ],
            [
                'pais' => 'Tonga',
                'nombre_excel' => 'TONGA',
            ],
            [
                'pais' => 'Trinidad y Tobago',
                'nombre_excel' => 'TRINIDAD Y TOBAGO',
            ],
            [
                'pais' => 'Túnez',
                'nombre_excel' => 'TUNEZ',
            ],
            [
                'pais' => 'Turquía',
                'nombre_excel' => 'TURQUIA',
            ],
            [
                'pais' => 'Turkmenistán',
                'nombre_excel' => 'TURKMENISTAN',
            ],
            [
                'pais' => 'Tuvalu',
                'nombre_excel' => 'TUVAlU',
            ],
            [
                'pais' => 'Uganda',
                'nombre_excel' => 'UGANDA',
            ],
            [
                'pais' => 'Ucrania',
                'nombre_excel' => 'UCRANIA',
            ],
            [
                'pais' => 'Emiratos Árabes Unidos',
                'nombre_excel' => 'EMIRATOS ARABES_UNIDOS',
            ],
            [
                'pais' => 'Reino Unido',
                'nombre_excel' => 'REINO UNIDO',
            ],
            [
                'pais' => 'Estados Unidos',
                'nombre_excel' => 'ESTADOS UNIDOS',
            ],
            [
                'pais' => 'Uruguay',
                'nombre_excel' => 'URUGUAY',
            ],
            [
                'pais' => 'Uzbekistán',
                'nombre_excel' => 'UZBEKISTAN',
            ],
            [
                'pais' => 'Vanuatu',
                'nombre_excel' => 'VANUATU',
            ],
            [
                'pais' => 'Venezuela',
                'nombre_excel' => 'VENEZUELA',
            ],
            [
                'pais' => 'Vietnam',
                'nombre_excel' => 'VIETNAM',
            ],
            [
                'pais' => 'Yemen',
                'nombre_excel' => 'YEMEN',
            ],
            [
                'pais' => 'Zambia',
                'nombre_excel' => 'ZAMBIA',
            ],
            [
                'pais' => 'Zimbabwe',
                'nombre_excel' => 'ZIMBABWE',
            ],
            [
                'pais' => 'Sin referencia',
                'nombre_excel' => 'SIN REFERENCIA',
            ],
        ];
        /* Inserta el excel sin necesidades de usar el foreach */
        DB::table('nationalities')->insert($paises);
        /* foreach ($paises as $pais) {

            foreach ($paises as $pais) {
                Nationality::create($pais);
            }
            
        } */
    }
}
