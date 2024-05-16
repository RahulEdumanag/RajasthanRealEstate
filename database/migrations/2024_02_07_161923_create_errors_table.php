<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('errors', function (Blueprint $table) {
            $table->id('Error_Id');
            $table->foreignId('Error_Reg_Id')->nullable();
            $table->text('Error_Message');
            $table->boolean('Error_Status')->default(1);
            $table->foreignId('Error_CreatedBy')->nullable();
            $table->foreignId('Error_UpdatedBy')->nullable();
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
        Schema::dropIfExists('errors');
    }
}
