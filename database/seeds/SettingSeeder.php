<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Setting;
//use App\User;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Hardik',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        //Insert Multiple records in Database using Faker
        for ($i=0; $i < 10; $i++) { 
          User::create([
                'name' => str_random(8),
                'email' => str_random(12).'@mail.com',
                'password' => Hash::make('12345678'),
            ]);
        }
        */

        Setting::truncate();
        
        /*$settings = array();
        for ($i=0; $i < 10; $i++) { 
          Setting::create([
              'setting_name' => "Material Choice",
              'setting_value' => "Color Coated Profile Sheet, Tile Profile Sheet, Spanish Tile Profile Sheet, UPVC Roofing Sheet",
              //'status' => 1,
          ]);
        }*/

        /*
          [
            'setting_name' => "",
            'setting_value' => "",
            //'status' => 1,
          ],
        */

        $settings =  [
                      [
                        'setting_name' => "Material Choice",
                        'setting_value' => "Color Coated Profile Sheet, Tile Profile Sheet, Spanish Tile Profile Sheet, UPVC Roofing Sheet",
                        //'status' => 1,
                      ],
                      [
                        'setting_name' => "GI Pipe Size",
                        'setting_value' => "40 x 40 x 1.6 mm, 40 x 40 x 2.0 mm, 50 x 50 x 1.6 mm, 50 x 50 x 2.0 mm, 75 x 75 x 2.5 mm, 75 x 75 x 3.0 mm, 60 x 40 x 2.5 mm, 60 x 40 x 3.0 mm, 80 x 40 x 2.5 mm, 80 x 40 x 3.0 mm, 100 x 50 x 2.5 mm, 100 x 50 x 3.0 mm",
                        //'status' => 1,
                      ],
                      [
                        'setting_name' => "Angle Section",
                        'setting_value' => "20 x 20 x 3 mm, 25 x 25 x 3 mm, 25 x 25 x 5 mm, 30 x 30 x 3 mm, 75 x 75 x 6 mm, 50 x 50 x 5 mm",
                        //'status' => 1,
                      ],
                      [
                        'setting_name' => "Chennel",
                        'setting_value' => "75 x 40, 100 x 50, 125 x 65, 150 x 75, 175 x 75",
                        //'status' => 1,
                      ],
                      [
                        'setting_name' => "Seeting",
                        'setting_value' => "116 x 100, 125 x 75, 150 x 80, 175 x 85, 200 x 100, 150 x 125",
                        //'status' => 1,
                      ]
                    ];
        
        foreach($settings as $setting){
          Setting::create($setting);
        }          
          
          //Setting::create($settings);
          //php artisan db:seed --class=SettingSeeder
    }
}
