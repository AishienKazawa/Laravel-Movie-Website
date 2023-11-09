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
        Schema::create('watch_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->string('movie_id');
            $table->string('title');
            $table->string('genre');
            $table->string('release_year');
            $table->string('director');
            $table->string('cast');
            $table->string('duration');
            $table->decimal('ratings', 3, 1);
            $table->decimal('imdb', 3, 1);
            $table->string('fr');
            $table->string('country');
            $table->text('plot');
            $table->string('image');
            $table->string('cover');
            $table->json('screenshots');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watch_list');
    }
};
