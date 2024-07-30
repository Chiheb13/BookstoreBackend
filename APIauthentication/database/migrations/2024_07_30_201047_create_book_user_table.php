<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->date('current_date');
            $table->date('last_date');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('book_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->uponUpdate('cascade')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->uponUpdate('cascade')->onDelete('cascade');
            $table->primary(['user_id','book_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_user');
    }
};
