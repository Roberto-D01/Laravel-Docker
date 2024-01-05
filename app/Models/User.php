<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'cpf_cnpj', 'customer_type_id', 'email', 'password', 'dt_closure'];

    // Relacionamento com a tabela 'customer_types'
    public function customerType()
    {
        return $this->belongsTo(CustomerType::class);
    }

    // Relacionamento com a tabela 'accounts'
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    // Relacionamento com a tabela 'emails'
    public function emails()
    {
        return $this->hasMany(Email::class);
    }
}
