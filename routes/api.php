<?php

use App\Http\Controllers\Api\AgentApiController;
use App\Http\Controllers\Api\BankApiController;
use App\Http\Controllers\Api\LeadApiController;
use App\Http\Controllers\Api\RateApiController;
use App\Http\Controllers\Api\PolicyApiController;
use App\Http\Controllers\Api\LenderApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('agent/login', [AgentApiController::class, 'login']);
Route::post('agent/all', [AgentApiController::class, 'allAgent']);
Route::get('announcement/all', [AgentApiController::class, 'allAnnouncement']);
Route::get('bank/policies', [BankApiController::class, 'policies']);
Route::post('bank/policies/search', [BankApiController::class, 'searchPolicies']);

Route::post('bank/rates', [RateApiController::class, 'rates']);
Route::post('bank/rate/detail', [RateApiController::class, 'rateDetail']);

Route::post('lead/create', [LeadApiController::class, 'createLead']);

Route::get('policies/all', [PolicyApiController::class, 'allPolicies']);
Route::post('policy/bank/list', [PolicyApiController::class, 'policyBankList']);
Route::post('policy/bank/policy_detail', [PolicyApiController::class, 'policyBankDetail']);


Route::get('lender/bank/all', [LenderApiController::class, 'allBanks']);
Route::post('lender/bank/directory', [LenderApiController::class, 'allBankDirectory']);



