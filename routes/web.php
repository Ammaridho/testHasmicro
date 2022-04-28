<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Index
Route::get('/','indexController@index')->name('index');

// FormLogin ==============================================================
Route::post('/login','authController@login')->name('login');

// session ==============================================================
Route::group(['middleware' => 'ceksession'], function()
{


    // LombaBootcamp ====================================================

        // Lihat Pendataan LombaBootcamp
        Route::get('/LombaBootcamp','lombaBootcampController@lihatDatalombaBootcamp')->name('lihatDatalombaBootcamp');

        // form input detail peserta
        Route::get('/LombaBootcamp/inputDetailPeserta','lombaBootcampController@inputDetailPeserta')->name('inputDetailPeserta');

        // store data LombaBootcamp
        Route::post('/LombaBootcamp/store','lombaBootcampController@storeTeam')->name('storeTeam');

        // lihat detail Data Team
        Route::get('/LombaBootcamp/lihatDetailTeam','lombaBootcampController@lihatDetailTeam')->name('lihatDetailTeam');

        // lihat detail Data Team
        Route::put('/LombaBootcamp/UbahTeam','lombaBootcampController@UbahTeam')->name('storeUbahTeam');

        // Hapus Data Team
        Route::post('/LombaBootcamp/hapusTeam','lombaBootcampController@hapusTeam')->name('hapusTeam');


    // persentase Karakter ==============================================

        // lihat persentase karakter
        Route::get('/persentaseKarakter','persentaseKarakterController@index')->name('persentaseKarakter');


    //logout
    Route::get('/logout','authController@logout')->name('logout');
    
});