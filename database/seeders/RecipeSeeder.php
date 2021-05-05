<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipes = [
            [
                'user_id' => 1,
                'category_id' => 1,
                'name' => 'Bolo de fubá',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'cooking_time' => 30,
                'portion' => 8,
                'ingredients' =>  [
                    "3 ovos inteiros",
                    "2 xícaras (chá) de açúcar",
                    "2 xícaras (chá) de fubá",
                    "3 colheres (sopa) de farinha de trigo",
                    "1/2 copo (americano) de óleo",
                    "1 copo (americano) de leite",
                    "1 colher (sopa) de fermento em pó"
                ],
                'preparing' =>  [
                    "Em um liquidificador, adicione os ovos, o açúcar, o fubá, a farinha de trigo, o óleo, o leite e o fermento, depois bata até a massa ficar lisa e homogênea.",
                    "Despeje a massa em uma forma untada e polvilhada.",
                    "Leve para assar em forno médio 180 °C) preaquecido por 40 minutos."
                ],
            ],
            [
                'user_id' => 1,
                'category_id' => 9,
                'name' => 'Joelho',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'cooking_time' => 45,
                'portion' => 4,
                'ingredients' =>  [
                    "1 copo de leite morno",
                    "30 g de fermento para pão",
                    "1 colher sopa rasa açúcar",
                    "1 colher chá de sal",
                    "1/2 copo de óleo",
                    "1/2 kg de farinha de trigo (mais ou menos)",
                    "Queijo",
                    "Presunto"
                ],
                'preparing' =>  [
                    "Dissolve o fermento com o açúcar. Colocar o óleo o leite e todos os ingredientes. Deixar descansar por 15 minutos.",
                    "Faça bolinhas pequenas. Depois abra a massa e recheio com uma fatia de queijo e outra de presunto. Enrole como rocambole e pincele com gema. Leve ao forno até dourar."
                ],
            ],
            [
                'user_id' => 1,
                'category_id' => 6,
                'name' => 'Caldo Verde',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'cooking_time' => 30,
                'portion' => 4,
                'ingredients' =>  [
                    "4 batatas médias",
                    "1 tablete de caldo de galinha",
                    "1 colher (sopa) de óleo",
                    "1 colher (sopa) rasa de sal ou a gosto",
                    "5 xícaras (chá) de água",
                    "1 xícara (chá) de couve manteiga cortada em tiras",
                    "1 lingüiça calabresa defumada cortada em rodelas"
                ],
                'preparing' =>  [
                    "Na panela de pressão, coloque a batata, o caldo de galinha, o óleo, a água e sal.",
                    "Cozinhe por cerca de 10 minutos (começar a contar o tempo depois que a panela começar a chiar) até a batata desmanchar.",
                    "Em seguida, bata tudo no liquidificador.",
                    "Acrescente as rodelas de calabresa e ferva.",
                    "Desligue o fogo e adicione a couve-manteiga.",
                    "Na hora de servir, coloque um fio de azeite ou croutons"
                ],
                'note' => 'Dica: para incrementar e deixar o seu caldo verde mais gostoso, você pode adicionar temperos como louro e noz-moscada. Fica uma delícia! O caldo verde fica perfeito se preparado naquelas épocas em que o frio aparece. As temperaturas diminuem e nada mais gostoso do que comer uma receita quentinha.'
            ],
            // [
            //     'category_id' => 1,
            //     'name' => '',
            //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            //     'cooking_time' => 30,
            //     'ingredients' =>  [
            //         ""
            //     ],
            //     'preparing' =>  [
            //         ""
            //     ],
            // ],
        ];

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }
}
