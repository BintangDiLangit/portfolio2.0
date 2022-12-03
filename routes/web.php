<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
    return view('welcome');
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/detail-portfolio/{id}', [WelcomeController::class, 'detailPortfolio'])->name('detail');
Route::post('/email', [WelcomeController::class, 'sendEmail'])->name('send.email');

Route::get('sitemap', function () {

    $site = App::make('sitemap');
    $site->add(URL::to('/'), date("Y-m-d h:i:s"), 1, 'daily');

    $responsePortfolio = Http::post(env('APP_URL_API') . '/api/v1/all-portfolios');
    $portfolios = $responsePortfolio->json()["data"];

    foreach ($portfolios as $key => $value) {
        $site->add(URL::to('/detail-portfolio/' . $value['id']), $value['created_at'], 1, 'daily');
    }

    $site->store('xml', 'sitemap');
});