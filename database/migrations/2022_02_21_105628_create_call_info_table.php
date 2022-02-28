<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('call_info')){
            Schema::create('call_info', function (Blueprint $table) {
                $table->id();
                $table->string('name_fa');
                $table->string('name_en')->nullable();
                $table->string('position_fa');
                $table->string('position_en')->nullable();
                $table->string('phone_number');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_info');
    }
}
