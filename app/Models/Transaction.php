<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['transaction_type_id', 'transaction_value', 'account_id'];

    // Relacionamento com a tabela 'transaction_types'
    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }

    // Relacionamento com a tabela 'accounts'
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
