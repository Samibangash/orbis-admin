<?php


use App\Http\Controllers\AgentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BankCreditController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LenderDirectoryController;
use App\Http\Controllers\PolicyBankController;
use App\Http\Controllers\PolicyDetailController;
use App\Http\Controllers\PolicyListController;
use App\Http\Controllers\RateBankController;
use App\Http\Controllers\RateListController;
use App\Http\Controllers\LenderBankController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->get('home', function() {
	return view('home');
})->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');
});
/* *** Agents *** */
Route::prefix('agent')->name('agent.')->middleware(['auth'])->controller(AgentController::class)->group(function(){
    Route::get('list', 'index')->name('list');
    Route::post('ajax/list', 'getAgents')->name('ajax.list');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('edit', 'edit')->name('edit');
    Route::put('update', 'update')->name('update');
});
/* *** Lead *** */
Route::prefix('lead')->name('lead.')->middleware(['auth'])->controller(LeadController::class)->group(function(){
    Route::get('list', 'index')->name('list');
    Route::post('ajax/list', 'getLead')->name('ajax.list');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('edit', 'edit')->name('edit');
    Route::put('update', 'update')->name('update');
});


/* ************* */
/* *** Usama *** */
/* ************* */
 // policy bank
 Route::prefix('policy/bank')->name('policy.bank.')->middleware(['auth'])->controller(PolicyBankController::class)->group(function(){
    Route::get('list', 'index')->name('list');
    Route::post('ajax/list','getBanks')->name('ajax.list');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('edit', 'edit')->name('edit');
    Route::put('update', 'update')->name('update');
 });
//  policy list
 Route::prefix('policy')->name('policy.')->middleware(['auth'])->controller(PolicylistController::class)->group(function(){
    Route::get('list', 'index')->name('list');
    Route::post('ajax/list','getPolicies')->name('ajax.list');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('edit','edit')->name('edit');
    Route::put('update', 'update')->name('update');
    Route::get('policy_banks/{id}', 'policyBankIndex')->name('policy.bank.list');
    Route::post('ajax/bank/list','gePolicyBankList')->name('ajax.bank.list');
    Route::get('policy/bank/view','show')->name('view.bank.list');
 });
  // policy details
Route::prefix('policy/detail')->name('policy.detail.')->middleware(['auth'])->controller(PolicyDetailController::class)->group(function(){
    Route::get('list', 'index')->name('list');
    Route::post('ajax/list','getBanks')->name('ajax.list');
    Route::post('store', 'store')->name('store');
    Route::post('edit', 'edit')->name('edit');
    Route::put('update', 'update')->name('update');
});



/* ************** */
/* *** Zaheer *** */
/* ************** */

/* *** Bank Rates *** */
Route::prefix('rate_bank')->name('rate_bank.')->middleware(['auth'])->controller(RateBankController::class)->group(function(){
    Route::get('index', 'index')->name('index');
    Route::post('list', 'getRateBank')->name('list');
    Route::post('store', 'store')->name('store');
    Route::post('edit', 'edit')->name('edit');
    Route::put('update', 'update')->name('update');
});

/* *** Rates List*** */
Route::prefix('rate_list')->name('rate_list.')->middleware(['auth'])->controller(RateListController::class)->group(function(){
    Route::get('index', 'index')->name('index');
    Route::post('list', 'getRateList')->name('list');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('view', 'show')->name('view');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update/{id}', 'update')->name('update');
});

/* *** Lender Banks *** */
Route::prefix('lender_bank/')->name('lender_bank.')->middleware(['auth'])->controller(LenderBankController::class)->group(function(){
    Route::get('list', 'index')->name('list');
    Route::post('ajax/list', 'getLenderBanks')->name('ajax.list');
    Route::post('store', 'store')->name('store');
    Route::post('edit', 'edit')->name('edit');
    Route::put('update', 'update')->name('update');
    Route::get('view', 'show')->name('view');
});

/* *** Lender Directory *** */
Route::prefix('lender_directory')->name('lender_directory.')->middleware(['auth'])->controller(LenderDirectoryController::class)->group(function(){
    Route::get('list', 'index')->name('list');
    Route::post('ajax/list', 'getLenderDirectory')->name('ajax.list');
    Route::post('store', 'store')->name('store');
    Route::post('edit', 'edit')->name('edit');
    Route::put('update', 'update')->name('update');
});


/* ************** */
/* *** Usman *** */
/* ***********(** */
Route::prefix('announcement')->name('anc.')->middleware(['auth'])->controller(AnnouncementController::class)->group(function(){
    Route::get('list', 'index')->name('list');
    Route::post('ajax/list', 'getAnnouncement')->name('ajax.list');
    Route::post('store', 'store')->name('store');
    Route::get('view', 'show')->name('view');
});
