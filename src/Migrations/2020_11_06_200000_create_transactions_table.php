<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Create the subscription table
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function ($table) {
            $table->increments('id');

            $table->integer('user_id')->index()->unsigned();

            $table->string('transaction_id');
            $table->json('quantity')->nullable();
            $table->string('notification_id')->nullable();

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
        Schema::drop('transactions');
    }
}