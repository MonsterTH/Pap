<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    use HasFactory;

    public function up(): void
    {
        Schema::create('administradors', function (Blueprint $table) {
            $table->id();

            $table->string('email');
            $table->string('username', 60);
            $table->string('password');
            $table->string('photo', 50)->nullable();
            $table->date('creation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradors');
    }
};
