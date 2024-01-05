<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['user_id', 'account_type_id', 'bank_branch', 'account_number', 'balance_available', 'dt_open', 'dt_closure'];

    // Relacionamento com a tabela 'users'
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com a tabela 'account_types'
    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }

    // Relacionamento com a tabela 'transactions'
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
