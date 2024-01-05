<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    protected $fillable = ['desc_tipo'];
    
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

