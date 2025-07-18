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
        Schema::create('students', function (Blueprint $table) {
 $table->id();
 $table->string('name');
 $table->string('nim')->unique();
 $table->string('email');
 $table->string('address');
 $table->string('major');
 $table->date('birth_date');
 $table->enum('gender', ['L', 'P']);
 $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
