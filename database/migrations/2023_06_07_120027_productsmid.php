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

        try {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->decimal('price', 8, 2);
                $table->string('image')->nullable();
                $table->integer('sale')->nullable();
                $table->text('description')->nullable();
                $table->integer('sold')->default(0);
                $table->timestamps();            });
        } catch (\Illuminate\Database\QueryException $exception) {
            dd($exception);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
