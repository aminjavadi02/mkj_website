<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('aboutus')){
            Schema::create('aboutus', function (Blueprint $table) {
                $table->id();
                $table->text('history_en')->nullable();
                $table->text('history_fa')->nullable();
                $table->string('office_phone')->nullable();
                $table->string('factory_phone')->nullable();
                $table->string('office_address_en')->nullable();
                $table->string('office_address_fa')->nullable();
                $table->string('factory_address_en')->nullable();
                $table->string('factory_address_fa')->nullable();
                $table->string('google_location_factory')->nullable();
                $table->string('google_location_office')->nullable();
                $table->string('image_name')->nullable();

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
        Schema::dropIfExists('aboutus');
    }
}
