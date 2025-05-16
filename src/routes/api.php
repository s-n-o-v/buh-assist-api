<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CertController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\TaxOfficeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('certs', CertController::class);
Route::apiResource('tags', TagController::class);
Route::apiResource('taxoffices', TaxOfficeController::class);
Route::apiResource('organizations', OrganizationController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', fn(Request $request) => $request->user());
    Route::apiResource('clients', ClientController::class);
});
