<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsuranceTypeController;
use App\Http\Controllers\InsurancePolicyController;
use App\Http\Controllers\TaxSettingController;
use App\Http\Controllers\AttendanceSettingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class);

Route::resource('insurance-types', InsuranceTypeController::class);
Route::get('insurance-types/trashed', [InsuranceTypeController::class, 'trashed'])->name('insurance-types.trashed');
Route::post('insurance-types/{id}/restore', [InsuranceTypeController::class, 'restore'])->name('insurance-types.restore');
Route::delete('insurance-types/{id}/force-delete', [InsuranceTypeController::class, 'forceDelete'])->name('insurance-types.forceDelete');

Route::resource('insurance-policies', InsurancePolicyController::class);
Route::get('insurance-policies/trashed', [InsurancePolicyController::class, 'trashed'])->name('insurance-policies.trashed');
Route::post('insurance-policies/{id}/restore', [InsurancePolicyController::class, 'restore'])->name('insurance-policies.restore');
Route::delete('insurance-policies/{id}/force-delete', [InsurancePolicyController::class, 'forceDelete'])->name('insurance-policies.forceDelete');

Route::resource('tax-settings', TaxSettingController::class);
Route::resource('attendance-settings', AttendanceSettingController::class);