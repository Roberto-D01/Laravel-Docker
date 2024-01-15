<?php


use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmailController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function sendTransactionEmail()
    {
        $transactions = DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('emails', 'transactions.user_id', '=', 'emails.user_id')
            ->select('transactions.*', 'users.email as user_email', 'emails.subject', 'emails.body')
            ->get();
    
        foreach ($transactions as $transaction) {
            $this->emailService->sendTransactionEmail(
                [$transaction->user_email],
                dd($transaction->user_email);
                $transaction->subject,
                $transaction->body
            );
        }
    
        return response()->json(['message' => 'E-mails enviados com sucesso']);
    }
}
