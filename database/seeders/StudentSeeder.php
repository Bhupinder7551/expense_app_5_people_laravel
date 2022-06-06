<?php

namespace Database\Seeders;

Use Faker\Factory as faker;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                
        $faker= Faker::create();
        foreach(range(1,10) as $value){
        DB::table('students')->insert([
            'name'=>$faker->name(),
            'city'=>$faker->city(),
            'contact'=>$faker->phoneNumber(10),            
            'email'=>$faker->unique()->safeEmail(),
            // 'created_at'=>$faker->dateTime(),
             'image' => $faker->image('public/images',400,300, null, false) 
        // 'password'=>$faker->Hash::make($faker->password()),
        ]);
        }

//  DB::table('students')->insert([
//             'name'=>'rahul',
//             'city'=>'afafa',
//             'contact'=>'02041482456',
//         'email'=>'rahul@gmail.com',
//          ]);
    }
}
