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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();

            $table->string('name', 80);
            $table->string('type', 60);
            $table->string('description', 200);
            $table->date('start_date');

            $table->foreignId('winner_id')
                ->constrained('players')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

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
