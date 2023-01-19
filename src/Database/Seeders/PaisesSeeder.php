<?php

namespace Juarismi\Base\Database\Seeders;


use Illuminate\Database\Seeder;
use Juarismi\Base\Models\Common\Pais;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$paises = [
			[ 'pais' => 'AUSTRALIA' ],
			[ 'pais' => 'CHINA' ],
			[ 'pais' => 'JAPAN' ],
			[ 'pais' => 'THAILAND' ],
			[ 'pais' => 'INDIA' ],
			[ 'pais' => 'MALAYSIA' ],
			[ 'pais' => 'KORE' ],
			[ 'pais' => 'HONG KONG' ],
			[ 'pais' => 'TAIWAN' ],
			[ 'pais' => 'PHILIPPINES' ],
			[ 'pais' => 'VIETNAM' ],
			[ 'pais' => 'FRANCE' ],
			[ 'pais' => 'EUROPE' ],
			[ 'pais' => 'GERMANY' ],
			[ 'pais' => 'SWEDEN' ],
			[ 'pais' => 'ITALY' ],
			[ 'pais' => 'GREECE' ],
			[ 'pais' => 'SPAIN' ],
			[ 'pais' => 'AUSTRIA' ],
			[ 'pais' => 'UNITED KINGDOM' ],
			[ 'pais' => 'NETHERLANDS' ],
			[ 'pais' => 'BELGIUM' ],
			[ 'pais' => 'SWITZERLAND' ],
			[ 'pais' => 'UNITED ARAB EMIRATES' ],
			[ 'pais' => 'ISRAEL' ],
			[ 'pais' => 'UKRAINE' ],
			[ 'pais' => 'RUSSIAN FEDERATION' ],
			[ 'pais' => 'KAZAKHSTAN' ],
			[ 'pais' => 'PORTUGAL' ],
			[ 'pais' => 'SAUDI ARABIA' ],
			[ 'pais' => 'DENMARK' ],
			[ 'pais' => 'IRA' ],
			[ 'pais' => 'NORWAY' ],
			[ 'pais' => 'UNITED STATES' ],
			[ 'pais' => 'MEXICO' ],
			[ 'pais' => 'CANADA' ],
			[ 'pais' => 'ANONYMOUS PROXY' ],
			[ 'pais' => 'SYRIAN ARAB REPUBLIC' ],
			[ 'pais' => 'CYPRUS' ],
			[ 'pais' => 'CZECH REPUBLIC' ],
			[ 'pais' => 'IRAQ' ],
			[ 'pais' => 'TURKEY' ],
			[ 'pais' => 'ROMANIA' ],
			[ 'pais' => 'LEBANON' ],
			[ 'pais' => 'HUNGARY' ],
			[ 'pais' => 'GEORGIA' ],
			[ 'pais' => 'BRAZIL' ],
			[ 'pais' => 'AZERBAIJAN' ],
			[ 'pais' => 'SATELLITE PROVIDER' ],
			[ 'pais' => 'PALESTINIAN TERRITORY' ],
			[ 'pais' => 'LITHUANIA' ],
			[ 'pais' => 'OMAN' ],
			[ 'pais' => 'SLOVAKIA' ],
			[ 'pais' => 'SERBIA' ],
			[ 'pais' => 'FINLAND' ],
			[ 'pais' => 'ICELAND' ],
			[ 'pais' => 'BULGARIA' ],
			[ 'pais' => 'SLOVENIA' ],
			[ 'pais' => 'MOLDOV' ],
			[ 'pais' => 'MACEDONIA' ],
			[ 'pais' => 'LIECHTENSTEIN' ],
			[ 'pais' => 'JERSEY' ],
			[ 'pais' => 'POLAND' ],
			[ 'pais' => 'CROATIA' ],
			[ 'pais' => 'BOSNIA AND HERZEGOVINA' ],
			[ 'pais' => 'ESTONIA' ],
			[ 'pais' => 'LATVIA' ],
			[ 'pais' => 'JORDAN' ],
			[ 'pais' => 'KYRGYZSTAN' ],
			[ 'pais' => 'REUNION' ],
			[ 'pais' => 'IRELAND' ],
			[ 'pais' => 'LIBYA' ],
			[ 'pais' => 'LUXEMBOURG' ],
			[ 'pais' => 'ARMENIA' ],
			[ 'pais' => 'VIRGIN ISLAND' ],
			[ 'pais' => 'YEMEN' ],
			[ 'pais' => 'BELARUS' ],
			[ 'pais' => 'GIBRALTAR' ],
			[ 'pais' => 'MARTINIQUE' ],
			[ 'pais' => 'PANAMA' ],
			[ 'pais' => 'DOMINICAN REPUBLIC' ],
			[ 'pais' => 'GUAM' ],
			[ 'pais' => 'PUERTO RICO' ],
			[ 'pais' => 'VIRGIN ISLAND' ],
			[ 'pais' => 'MONGOLIA' ],
			[ 'pais' => 'NEW ZEALAND' ],
			[ 'pais' => 'SINGAPORE' ],
			[ 'pais' => 'INDONESIA' ],
			[ 'pais' => 'NEPAL' ],
			[ 'pais' => 'PAPUA NEW GUINEA' ],
			[ 'pais' => 'PAKISTAN' ],
			[ 'pais' => 'ASIA/PACIFIC REGION' ],
			[ 'pais' => 'BAHAMAS' ],
			[ 'pais' => 'SAINT LUCIA' ],
			[ 'pais' => 'ARGENTINA' ],
			[ 'pais' => 'BANGLADESH' ],
			[ 'pais' => 'TOKELAU' ],
			[ 'pais' => 'CAMBODIA' ],
			[ 'pais' => 'MACAU' ],
			[ 'pais' => 'MALDIVES' ],
			[ 'pais' => 'AFGHANISTAN' ],
			[ 'pais' => 'NEW CALEDONIA' ],
			[ 'pais' => 'FIJI' ],
			[ 'pais' => 'WALLIS AND FUTUNA' ],
			[ 'pais' => 'QATAR' ],
			[ 'pais' => 'ALBANIA' ],
			[ 'pais' => 'BELIZE' ],
			[ 'pais' => 'UZBEKISTAN' ],
			[ 'pais' => 'KUWAIT' ],
			[ 'pais' => 'MONTENEGRO' ],
			[ 'pais' => 'PERU' ],
			[ 'pais' => 'BERMUDA' ],
			[ 'pais' => 'CURACAO' ],
			[ 'pais' => 'COLOMBIA' ],
			[ 'pais' => 'VENEZUELA' ],
			[ 'pais' => 'CHILE' ],
			[ 'pais' => 'ECUADOR' ],
			[ 'pais' => 'SOUTH AFRICA' ],
			[ 'pais' => 'ISLE OF MAN' ],
			[ 'pais' => 'BOLIVIA' ],
			[ 'pais' => 'GUERNSEY' ],
			[ 'pais' => 'MALTA' ],
			[ 'pais' => 'TAJIKISTAN' ],
			[ 'pais' => 'SEYCHELLES' ],
			[ 'pais' => 'BAHRAIN' ],
			[ 'pais' => 'EGYPT' ],
			[ 'pais' => 'ZIMBABWE' ],
			[ 'pais' => 'LIBERIA' ],
			[ 'pais' => 'KENYA' ],
			[ 'pais' => 'GHANA' ],
			[ 'pais' => 'NIGERIA' ],
			[ 'pais' => 'TANZANI' ],
			[ 'pais' => 'ZAMBIA' ],
			[ 'pais' => 'MADAGASCAR' ],
			[ 'pais' => 'ANGOLA' ],
			[ 'pais' => 'NAMIBIA' ],
			[ 'pais' => 'COTE D\'IVOIRE' ],
			[ 'pais' => 'SUDAN' ],
			[ 'pais' => 'CAMEROON' ],
			[ 'pais' => 'MALAWI' ],
			[ 'pais' => 'GABON' ],
			[ 'pais' => 'MALI' ],
			[ 'pais' => 'BENIN' ],
			[ 'pais' => 'CHAD' ],
			[ 'pais' => 'BOTSWANA' ],
			[ 'pais' => 'CAPE VERDE' ],
			[ 'pais' => 'RWANDA' ],
			[ 'pais' => 'CONGO' ],
			[ 'pais' => 'UGANDA' ],
			[ 'pais' => 'MOZAMBIQUE' ],
			[ 'pais' => 'GAMBIA' ],
			[ 'pais' => 'LESOTHO' ],
			[ 'pais' => 'MAURITIUS' ],
			[ 'pais' => 'MOROCCO' ],
			[ 'pais' => 'ALGERIA' ],
			[ 'pais' => 'GUINEA' ],
			[ 'pais' => 'CONG' ],
			[ 'pais' => 'SWAZILAND' ],
			[ 'pais' => 'BURKINA FASO' ],
			[ 'pais' => 'SIERRA LEONE' ],
			[ 'pais' => 'SOMALIA' ],
			[ 'pais' => 'NIGER' ],
			[ 'pais' => 'CENTRAL AFRICAN REPUBLIC' ],
			[ 'pais' => 'TOGO' ],
			[ 'pais' => 'BURUNDI' ],
			[ 'pais' => 'EQUATORIAL GUINEA' ],
			[ 'pais' => 'SOUTH SUDAN' ],
			[ 'pais' => 'SENEGAL' ],
			[ 'pais' => 'MAURITANIA' ],
			[ 'pais' => 'DJIBOUTI' ],
			[ 'pais' => 'COMOROS' ],
			[ 'pais' => 'BRITISH INDIAN OCEAN TERRITORY' ],
			[ 'pais' => 'TUNISIA' ],
			[ 'pais' => 'GREENLAND' ],
			[ 'pais' => 'HOLY SEE (VATICAN CITY STATE)' ],
			[ 'pais' => 'COSTA RICA' ],
			[ 'pais' => 'CAYMAN ISLANDS' ],
			[ 'pais' => 'JAMAICA' ],
			[ 'pais' => 'GUATEMALA' ],
			[ 'pais' => 'MARSHALL ISLANDS' ],
			[ 'pais' => 'ANTARCTICA' ],
			[ 'pais' => 'BARBADOS' ],
			[ 'pais' => 'ARUBA' ],
			[ 'pais' => 'MONACO' ],
			[ 'pais' => 'ANGUILLA' ],
			[ 'pais' => 'SAINT KITTS AND NEVIS' ],
			[ 'pais' => 'GRENADA' ],
			[ 'pais' => 'PARAGUAY' ],
			[ 'pais' => 'MONTSERRAT' ],
			[ 'pais' => 'TURKS AND CAICOS ISLANDS' ],
			[ 'pais' => 'ANTIGUA AND BARBUDA' ],
			[ 'pais' => 'TUVALU' ],
			[ 'pais' => 'FRENCH POLYNESIA' ],
			[ 'pais' => 'SOLOMON ISLANDS' ],
			[ 'pais' => 'VANUATU' ],
			[ 'pais' => 'ERITREA' ],
			[ 'pais' => 'TRINIDAD AND TOBAGO' ],
			[ 'pais' => 'ANDORRA' ],
			[ 'pais' => 'HAITI' ],
			[ 'pais' => 'SAINT HELENA' ],
			[ 'pais' => 'MICRONESI' ],
			[ 'pais' => 'EL SALVADOR' ],
			[ 'pais' => 'HONDURAS' ],
			[ 'pais' => 'URUGUAY' ],
			[ 'pais' => 'SRI LANKA' ],
			[ 'pais' => 'WESTERN SAHARA' ],
			[ 'pais' => 'CHRISTMAS ISLAND' ],
			[ 'pais' => 'SAMOA' ],
			[ 'pais' => 'SURINAME' ],
			[ 'pais' => 'COOK ISLANDS' ],
			[ 'pais' => 'KIRIBATI' ],
			[ 'pais' => 'NIUE' ],
			[ 'pais' => 'TONGA' ],
			[ 'pais' => 'FRENCH SOUTHERN TERRITORIES' ],
			[ 'pais' => 'MAYOTTE' ],
			[ 'pais' => 'NORFOLK ISLAND' ],
			[ 'pais' => 'BRUNEI DARUSSALAM' ],
			[ 'pais' => 'TURKMENISTAN' ],
			[ 'pais' => 'PITCAIRN ISLANDS' ],
			[ 'pais' => 'SAN MARINO' ],
			[ 'pais' => 'ALAND ISLANDS' ],
			[ 'pais' => 'FAROE ISLANDS' ],
			[ 'pais' => 'SVALBARD AND JAN MAYEN' ],
			[ 'pais' => 'COCOS (KEELING) ISLANDS' ],
			[ 'pais' => 'NAURU' ],
			[ 'pais' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS' ],
			[ 'pais' => 'UNITED STATES MINOR OUTLYING ISLANDS' ],
			[ 'pais' => 'GUINEA-BISSAU' ],
			[ 'pais' => 'PALAU' ],
			[ 'pais' => 'AMERICAN SAMOA' ],
			[ 'pais' => 'BHUTAN' ],
			[ 'pais' => 'FRENCH GUIANA' ],
			[ 'pais' => 'GUADELOUPE' ],
			[ 'pais' => 'SAINT MARTIN' ],
			[ 'pais' => 'SAINT VINCENT AND THE GRENADINES' ],
			[ 'pais' => 'SAINT PIERRE AND MIQUELON' ],
			[ 'pais' => 'SAINT BARTHELEMY' ],
			[ 'pais' => 'DOMINICA' ],
			[ 'pais' => 'SAO TOME AND PRINCIPE' ],
			[ 'pais' => 'KORE' ],
			[ 'pais' => 'FALKLAND ISLANDS (MALVINAS)' ],
			[ 'pais' => 'NORTHERN MARIANA ISLANDS' ],
			[ 'pais' => 'TIMOR-LESTE' ],
			[ 'pais' => 'BONAIR' ],
			[ 'pais' => 'MYANMAR' ],
			[ 'pais' => 'NICARAGUA' ],
			[ 'pais' => 'SINT MAARTEN (DUTCH PART)' ],
			[ 'pais' => 'GUYANA' ],
			[ 'pais' => 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC' ],
			[ 'pais' => 'CUBA' ],
			[ 'pais' => 'ETHIOPIA' ],
        ];
    	
        Pais::truncate();
        foreach ($paises as $pais) {
        	Pais::create($pais);
        }
    }
}