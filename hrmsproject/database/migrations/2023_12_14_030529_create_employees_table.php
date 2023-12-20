<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longtext('address');            
            $table->integer('age');
            $table->date('birthday')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->date('date_hired')->nullable();
            $table->string('gender')->nullable();
            $table->longtext('department')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
