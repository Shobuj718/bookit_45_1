<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents('phone.json', 'r');
        $jsonObject = json_decode($jsonFile);

        foreach($jsonObject as $country => $code){
            if($country && $code){
                if(!starts_with($code, '+')){
                    $code = '+'.$code;
                }
        
                $code = trim(explode("and", $code)[0]);
        
                $cntry = new \App\Models\Country;
                $cntry->code = $country;
                $cntry->dialing_code = $code;
                $cntry->save();
            }
        }
    }


}
