<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(){

        DB::table('categories')->insertOrIgnore([
            ['id'=>1,'name'=>'كاميرات','imgepath'=>'assets\img\canonn.jpg','description'=>'كاميرات تصوير احترافيه'],
            ['id'=>2,'name'=>'ادوات تجميل','imgepath'=>'assets\img\makeag.jpg','description'=>'كاميرات تصوير احترافيه']
        ]
        );
        DB::table('products')->insertOrIgnore([
            ['id'=>1,'name'=>'1كاميرات','imagepath'=>'assets\img\canon1.jpg','description'=>'كاميرات تصوير احترافيه','price'=>10.2,'quantity'=>20,'category_id'=>1],
            ['id'=>2,'name'=>'كاميرات 2','imagepath'=>'assets\img\canon3.jpg','description'=>'كاميرات تصوير احترافيه','price'=>10.2,'quantity'=>20,'category_id'=>1],
            ['id'=>3,'name'=>'كاميرات 3','imagepath'=>'assets\img\makiag1.jpg','description'=>'كاميرات تصوير احترافيه','price'=>10.2,'quantity'=>20,'category_id'=>2]
        ]
        );
    }
}
