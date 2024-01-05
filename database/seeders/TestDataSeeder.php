<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestDataSeeder extends Seeder
{
    public function run()
    {
        // Criar tipos de cliente
        DB::table('customer_types')->insert([
            ['desc_tipo' => 'Cliente Padrão'],
            ['desc_tipo' => 'Cliente VIP'],
        ]);

        // Criar usuários
        $user1 = DB::table('users')->insertGetId([
            'name' => 'João Silva',
            'cpf_cnpj' => '123.456.789-01',
            'customer_type_id' => 1, // Cliente Padrão
            'email' => 'joao@example.com',
            'password' => Hash::make('senha123'),
            'dt_closure' => null,
        ]);

        $user2 = DB::table('users')->insertGetId([
            'name' => 'Maria Souza',
            'cpf_cnpj' => '987.654.321-09',
            'customer_type_id' => 2, // Cliente VIP
            'email' => 'maria@example.com',
            'password' => Hash::make('senha456'),
            'dt_closure' => null,
        ]);

        // Criar tipos de conta
        DB::table('account_types')->insert([
            ['desc_type' => 'Conta Corrente'],
            ['desc_type' => 'Conta Poupança'],
        ]);

        // Criar contas
        $account1 = DB::table('accounts')->insertGetId([
            'user_id' => $user1,
            'account_type_id' => 1, // Conta Corrente
            'bank_branch' => '001',
            'account_number' => '12345-6',
            'balance_available' => 5000.00,
            'dt_open' => now(),
            'dt_closure' => null,
        ]);

        $account2 = DB::table('accounts')->insertGetId([
            'user_id' => $user2,
            'account_type_id' => 2, // Conta Poupança
            'bank_branch' => '002',
            'account_number' => '54321-0',
            'balance_available' => 10000.00,
            'dt_open' => now(),
            'dt_closure' => null,
        ]);

        // Criar tipos de transação
        DB::table('transaction_types')->insert([
            ['desc_transaction' => 'Depósito'],
            ['desc_transaction' => 'Saque'],
        ]);

        // Criar transações
        DB::table('transactions')->insert([
            'transaction_type_id' => 1, // Depósito
            'transaction_value' => 1000.00,
            'account_id' => $account1,
            'created_at' => now(),
        ]);

        DB::table('transactions')->insert([
            'transaction_type_id' => 2, // Saque
            'transaction_value' => 500.00,
            'account_id' => $account1,
            'created_at' => now(),
        ]);

        // Criar e-mails
        DB::table('emails')->insert([
            'user_id' => $user1,
            'subject' => 'Depósito Realizado',
            'body' => 'Seu depósito de 1000.00 foi realizado com sucesso.',
            'sent_at' => now(),
        ]);

        DB::table('emails')->insert([
            'user_id' => $user2,
            'subject' => 'Saque Efetuado',
            'body' => 'Seu saque de 500.00 foi processado.',
            'sent_at' => now(),
        ]);
    }
}
