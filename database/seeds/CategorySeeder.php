<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Pub Inglés'
        ]);

        DB::table('categories')->insert([
            'name' => 'Comida Árabe'
        ]);

        DB::table('categories')->insert([
            'name' => 'Comida Mexicana'
        ]);

        DB::table('categories')->insert([
            'name' => 'Pub/Restaurante Español'
        ]);
    }
}
