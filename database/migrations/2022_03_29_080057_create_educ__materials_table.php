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
        Schema::create('educ__materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('Author');
            $table->string('type');
            $table->date('publishDate');
            $table->mediumText('description');
            $table->string('cover_image');
            $table->string('filename');
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
        Schema::dropIfExists('educ__materials');
    }
};