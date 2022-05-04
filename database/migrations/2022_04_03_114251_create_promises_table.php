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
        Schema::create('promises', function (Blueprint $table) {

            $table->id();
            $table->string("memberName");
            $table->float("promisedAmount");
            $table->float("paidAmount");
            $table->float("balance");
            $table->string("reason");
            $table->date("promisedDate");
            $table->foreignId('admin_id')
                            ->constrained()
                            ->onUpdate('cascade')
                            ->onDelete('cascade');
            $table->foreignId('member_id')
                            ->constrained()
                            ->nullable()
                            ->onUpdate('cascade')
                            ->onDelete('cascade');
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
        Schema::dropIfExists('promises');
    }
};