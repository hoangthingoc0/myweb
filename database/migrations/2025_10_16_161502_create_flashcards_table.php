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
    Schema::create('flashcards', function (Blueprint $table) {
        $table->id();
        $table->foreignId('topic_id')->constrained('flashcard_topics')->onDelete('cascade');
        $table->string('word'); 
        $table->string('meaning'); 
        $table->string('audio_url')->nullable(); // link phát âm
        $table->timestamps();
        $table->enum('state', ['new','learned','review'])->default('new');
        $table->timestamp('last_reviewed')->nullable();
        $table->integer('interval')->default(0); // cho spaced repetition

    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flashcards');
    }
};
