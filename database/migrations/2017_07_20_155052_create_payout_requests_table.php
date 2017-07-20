<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayoutRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payout_requests', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_ic');
            $table->boolean('approved')->default(false);
            $table->string('payout_status');
            $table->string('user_status');
            $table->datetime('updated_at')->nullable();
            $table->timestamp('created_at');
            $table->decimal('amount', 11, 2);
        });

        Schema::table('payout_requests', function(Blueprint $table){
            $table->foreign('user_ic')->references('ic')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payout_requests');
    }
}
