<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCycleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('cycle')){
            Schema::rename($cycle, $cycles);
            DB::table('cycles')->insert(
                array(
                    array('number_of_cycle' => 3),
                    array('number_of_cycle' => 9),
                )
            );
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cycle', function (Blueprint $table) {
            //
        });
    }
}
