<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $categories = [
            'varzesh' => [
                'slug'=>'sport',
                'icon'=>'fa fa-futbol-o',
            ],
            'bazi'=>[
                'slug'=>'game',
                'icon'=>'fa fa-gamepad',
            ],
            'tarikhi'=>[
                'slug'=>'history',
                'icon'=>'fa fa-university',

            ],
            'tanz' =>[
                'slug'=>'fun',
                'icon'=>'fa smaile-o',
            ],
            'cinema'=>[
                'slug'=>'cinema',
                'icon'=>'fa fa-film',
            ],
             'vahshat' =>[
                'slug'=>'horror',
                'icon'=>'fa fa-hashtag',
            ],
            'rechnology'=>[
                'slug'=>'tech',
                'icon'=>'fa fa-university',

            ],
           
        ];
        foreach($categories as $categoryName=>$detils){
          Category::create([
            'name'=>$categoryName,
            'slug'=>$detils['slug'],
            'icon'=>$detils['icon']
          ]);

        }
    }
}
