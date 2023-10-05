<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classe;
use App\Models\Module;
use App\Models\ModuleProf;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $module = [
            ["libelle" => "HTML"],
            ["libelle" => "CSS"],
            ["libelle" => "JS"],
            ["libelle" => "LARAVEL"],
            ["libelle" => "ANGULAR"],
            ["libelle" => "PHP"],
            ["libelle" => "C++"]
        ];
        $idProf=[1, 4, 6, 7, 9, 10, 18, 21];
        
        // return ;

        Module::insert($module);
        for ($i=0; $i <10 ; $i++) { 
            
            ModuleProf::insert($modProf = [
                [
                    "prof_id" => $idProf[rand(0,7)],
                    "module_id" => rand(1,7)
                ]
            ]);
        }
        $classe=[
            ["libelle"=>"licence1","nbreEtu"=>45],
            ["libelle"=>"licence2","nbreEtu"=>40],
            ["libelle"=>"licence3","nbreEtu"=>30],
            ["libelle"=>"licence4","nbreEtu"=>27],
            ["libelle"=>"licence5","nbreEtu"=>25],
            ["libelle"=>"licence6","nbreEtu"=>20],
         
        ];
            Classe::insert($classe);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
