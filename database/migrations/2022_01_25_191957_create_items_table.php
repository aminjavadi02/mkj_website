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
                $table->string('name_fa')->nullable();
                $table->string('name_en')->nullable();
                $table->text('description_fa')->nullable();
                $table->text('description_en')->nullable();
                $table->string('alloy')->nullable();
                $table->string('size')->nullable();
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
                $table->foreignId('package_id')->constrained()->onDelete('cascade')->nullable();

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
