<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId("salary_id")->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId("category_id")->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('company');
            $table->date('expire');
            $table->text('description');
            $table->string('image');
            $table->integer('published')->default(1);
            $table->foreignId("recruiter_id")->constrained("users", "id")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
