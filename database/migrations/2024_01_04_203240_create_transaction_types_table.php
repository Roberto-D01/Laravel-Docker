<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTypesTable extends Migration
{
    public function up()
    {
        Schema::create('transaction_types', function (Blueprint $table) {
            $table->id();
            $table->string('desc_transaction');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_types');
    }
}

