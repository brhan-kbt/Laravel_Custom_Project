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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->bigInteger('age');
            $table->string('sex');
            $table->string('grandName');
            $table->string('motherName');
            $table->string('baptismalName');
            $table->string('churchBaptize');
            $table->string('repetanceFatherName');
            $table->string('birthPlace');
            $table->string('phone')->unique();
            $table->string('address');
            $table->string('profileImg');
            $table->string('status');
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
        Schema::dropIfExists('members');
    }
};