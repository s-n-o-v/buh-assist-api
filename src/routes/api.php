<?php

use App\Filters\ClientTaxReportFilter;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CertController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\InteractionController;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\TaxOfficeController;
use App\Http\Controllers\Api\TaxReportController;
use App\Models\ClientTax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', fn(Request $request) => $request->user());
    Route::apiResource('clients', ClientController::class);
    Route::apiResource('certs', CertController::class);
    Route::apiResource('tags', TagController::class);
    Route::apiResource('tax-offices', TaxOfficeController::class);
    Route::apiResource('organizations', OrganizationController::class);
    Route::apiResource('notes', NoteController::class);
    Route::apiResource('interactions', InteractionController::class);
    Route::apiResource('tax-reports', TaxReportController::class);
    Route::apiResource('client-taxes', ClientTax::class);
    Route::apiResource('client-tax-reports', ClientTaxReportFilter::class);
});
