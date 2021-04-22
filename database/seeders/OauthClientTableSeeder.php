<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class OauthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Machine-to-machine Clients
        $client3 = Client::create([
            'name' => 'Painel Administrativo',
            'secret' => 'ho8pAzMv5YMyYAatNz8fgpuTZ549tZp7iHdNjGIz',
            'redirect' => '',
            'personal_access_client' => 0,
            'password_client' => 0,
            'revoked' => 0
        ]);
        $client3->permissions()->sync([1]);

        $client4 = Client::create([
            'name' => 'Aplicativo',
            'secret' => 'NjtEn07yOhpYWYunKNE4FgNBTgtsHT9GWK4gOx3Q',
            'redirect' => '',
            'personal_access_client' => 0,
            'password_client' => 0,
            'revoked' => 0
        ]);
        $client4->permissions()->sync([1]);
    }
}
