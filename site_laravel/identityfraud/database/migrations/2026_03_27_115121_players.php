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
       Schema::create('players', function (Blueprint $table) {
            $table->id();

            $table->string('name', 200);
            $table->date('birth_date');
            $table->text('about');
            $table->string('photo', 60);

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
