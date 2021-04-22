<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'renatospindolasistems@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('#Renat02234!'),
            'remember_token' => Str::random(10),
            'avatar' => 'avatar.png',
            'phone' => '(21) 970223081',
            'origin' => 'Seeder',
            'status' => 1,
            'gender' => 'M',
            'is_admin' => 1,
        ]);

        $accessToken = $user->createToken('TESTE')->accessToken;
        $interval = Passport::personalAccessTokensExpireIn();
        $expiresIn = date_create('@0')->add($interval)->getTimestamp();
    }
}
