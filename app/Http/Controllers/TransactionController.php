<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function deposit(Request $request)
    {
        try {
            // Lógica para depósito
            $amount = $request->input('amount');
            $account_id = $request->input('account_id');
            $user_id = $request->input('user_id');

            // Chamar o serviço de transação para depósito
            $result = $this->transactionService->deposit($amount, $account_id, $user_id);

            if ($result) {
                // Enviar email de confirmação
                $this->emailService->sendTransactionEmail($user_id, 'Depósito Realizado', 'Seu depósito foi realizado com sucesso.');
                return response()->json(['message' => 'Depósito realizado com sucesso']);
            } else {
                return response()->json(['error' => 'Saldo insuficiente'], 422);
            }
        } catch (\Exception $e) {
            // Log do erro
            \Log::error($e->getMessage());

            // Retornar erro 500 com mensagem genérica
            return response()->json(['error' => 'Erro interno no servidor'], 500);
        }
    }

    public function withdraw(Request $request)
    {
        try {
            // Lógica para saque
            $amount = $request->input('amount');
            $account_id = $request->input('account_id');
            $user_id = $request->input('user_id');

            // Chamar o serviço de transação para saque
            $result = $this->transactionService->withdraw($amount, $account_id, $user_id);

            if ($result) {
                // Enviar email de confirmação
                $this->emailService->sendTransactionEmail($user_id, 'Saque Realizado', 'Seu saque foi realizado com sucesso.');
                return response()->json(['message' => 'Saque realizado com sucesso']);
            } else {
                return response()->json(['error' => 'Saldo insuficiente'], 422);
            }
        } catch (\Exception $e) {
            // Log do erro
            \Log::error($e->getMessage());

            // Retornar erro 500 com mensagem genérica
            return response()->json(['error' => 'Erro interno no servidor'], 500);
        }
    }
}
