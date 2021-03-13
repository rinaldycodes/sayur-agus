<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('no_telp')->nullable();
            $table->text('address')->nullable();
            $table->text('message')->nullable();
            $table->integer('transaction_total')->nullable();
            $table->string('transaction_status')->nullable(); // IN_CART , PENDNG  , SUCCESS, CANCEL, FAILED
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
