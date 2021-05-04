<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Bolos e Tortas', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Carnes', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Aves', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Peixes e Frutos do mar', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Saladas e molhos', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Sopas', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Massas', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Bebidas', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Doces e Sobremesas', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Lanches', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Saudável', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['name' => 'Carnes', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'description' => $category['description'],
                'icon' => 'default.png'
            ]);
        }
    }
}
