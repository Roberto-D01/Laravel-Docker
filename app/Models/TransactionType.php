<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $fillable = ['desc_transaction'];

    // Relacionamento com a tabela 'transactions'
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
