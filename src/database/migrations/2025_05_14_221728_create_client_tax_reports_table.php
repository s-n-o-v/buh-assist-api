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
        Schema::create('client_tax_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_tax_id')->constrained()->onDelete('cascade');
            $table->decimal('profit')->nullable();
            $table->decimal('amount');
            $table->date('report_date')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_tax_reports');
    }
};
