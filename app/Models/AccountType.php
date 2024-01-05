<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $fillable = ['desc_type'];

    // Relacionamento com a tabela 'accounts'
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}

