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
        Schema::table('organizations', function (Blueprint $table) {
            // Удаляем старый внешний ключ и колонку
            $table->dropForeign(['tax_office_id']);
            $table->dropColumn('tax_office_id');

            // Добавляем новую колонку и внешний ключ
            $table->unsignedBigInteger('organization_id')->after('id'); // Поставь after нужного поля
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tax_reports', function (Blueprint $table) {
            // Удаляем organization_id
            $table->dropForeign(['organization_id']);
            $table->dropColumn('organization_id');

            // Восстанавливаем tax_office_id
            $table->unsignedBigInteger('tax_office_id')->after('id');
            $table->foreign('tax_office_id')->references('id')->on('tax_offices')->onDelete('cascade');
        });
    }
};
