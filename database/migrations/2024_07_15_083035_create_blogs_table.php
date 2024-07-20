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
        Schema::create(
            'blogs',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id');
                $table->foreignId('user_id');
                $table->string('image')->nullable();
                $table->string('title');
                $table->string('slug');
                $table->text('excerpt');
                $table->text('body');
                $table->string('status')->default('active');
                $table->timestamp('publised_at')->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
