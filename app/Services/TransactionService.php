<?php


namespace App\Services;

use App\Models\Transaction;
use App\Models\Account;

class TransactionService
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function deposit($amount, $account_id)
    {
        // Criar transação de depósito
        Transaction::create([
            'transaction_type_id' => 1,
            'transaction_value' => $amount,
            'account_id' => $account_id,
        ]);

        // Atualizar balance_available na tabela 'accounts'
        $account = Account::find($account_id);
        $account->balance_available += $amount;
        $account->save();

        // Enviar email de confirmação
        $this->emailService->sendTransactionEmail($account->user_id, 'Depósito Realizado', 'Seu depósito foi realizado com sucesso.');

        return true; // Depósito realizado com sucesso
    }

    public function withdraw($amount, $account_id)
    {
        // Verificar se há saldo suficiente
        $account = Account::find($account_id);
        if ($account->balance_available < $amount) {
            return false; // Saldo insuficiente
        }

        // Criar transação de saque
        Transaction::create([
            'transaction_type_id' => 2,
            'transaction_value' => $amount,
            'account_id' => $account_id,
        ]);

        // Atualizar balance_available na tabela 'accounts'
        $account->balance_available -= $amount;
        $account->save();

        // Enviar email de confirmação
        $this->emailService->sendTransactionEmail($account->user_id, 'Saque Realizado', 'Seu saque foi realizado com sucesso.');

        return true; // Saque realizado com sucesso
    }
}
