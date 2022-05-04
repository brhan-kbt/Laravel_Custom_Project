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
        Schema::create('church_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('churchName');
            $table->string('photo');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address');
            $table->foreignId('admin_id')
                            ->constrained();
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
        Schema::dropIfExists('church_profiles');
    }
};