<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('items')){
            Schema::create('items', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('name_fa');
                $table->string('name_en')->nullable();
                $table->text('description_fa');
                $table->text('description_en')->nullable();
                $table->string('alloy_fa')->nullable();
                $table->string('alloy_en')->nullable();
                $table->string('size')->nullable();
                $table->foreignId('category_id')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('items');
    }
}
