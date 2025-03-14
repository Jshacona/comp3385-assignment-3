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
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID for each client
            $table->string('name'); // Client's name
            $table->string('email')->unique(); // Client's email address (unique)
            $table->string('telephone'); // Client's telephone number
            $table->text('address'); // Client's address (long text field)
            $table->string('company_logo')->nullable(); // Path and filename to the uploaded company logo (nullable)
            $table->timestamps(); // Created at and updated at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
