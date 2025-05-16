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
        Schema::create('tax_reports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('tax_office_id')->constrained()->onDelete('cascade');
            $table->decimal('fine');
            $table->boolean('is_periodic')->default(false);
            $table->date('report_date')->nullable();
            $table->tinyInteger('every_month')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_reports');
    }
};
