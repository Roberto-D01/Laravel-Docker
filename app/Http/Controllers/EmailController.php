<?php

namespace App\Http\Controllers;

use App\Mail\TransactionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendTransactionEmail()
    {
        
        $transactions = DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('emails', 'transactions.user_id', '=', 'emails.user_id')
            ->select('transactions.*', 'users.email as user_email', 'emails.subject', 'emails.body')
            ->get();

        
        foreach ($transactions as $transaction) {
            Mail::to(['rj-evil@hotmail.com'])
                ->send(new TransactionMail([
                    'user_id' => $transaction->user_id,
                    'amount' => $transaction->amount,
                    'type' => $transaction->type,
                    'subject' => $transaction->subject,
                    'body' => $transaction->body,
                ]));
        }

        return response()->json(['message' => 'E-mails enviados com sucesso']);
    }
}

