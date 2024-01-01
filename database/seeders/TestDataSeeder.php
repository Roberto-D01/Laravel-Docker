<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestDataSeeder extends Seeder
{
    public function run()
    {
        $user = DB::table('users')->insertGetId([
            'name' => 'Usuário Teste',
            'email' => 'teste@email.com',
            'password' => bcrypt('senha123'),
        ]);

        DB::table('transactions')->insert([
            'user_id' => $user,
            'amount' => 1000.00,
            'type' => 'deposit',
            'created_at' => now(),
        ]);

        DB::table('transactions')->insert([
            'user_id' => $user,
            'amount' => 500.00,
            'type' => 'withdraw',
            'created_at' => now(),
        ]);

        DB::table('emails')->insert([
            'user_id' => $user,
            'subject' => 'Depósito Realizado',
            'body' => 'Seu depósito de 1000.00 foi realizado com sucesso.',
            'sent_at' => now(),
        ]);

        DB::table('emails')->insert([
            'user_id' => $user,
            'subject' => 'Saque Realizado',
            'body' => 'Seu saque de 500.00 foi processado.',
            'sent_at' => now(),
        ]);
    }
}
