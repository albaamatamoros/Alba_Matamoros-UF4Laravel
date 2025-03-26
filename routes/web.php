<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\ArxiuPirataController;

// INDEX

Route::get('/', function () {
    return view('index');
})->name('index');

// LOGIN

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login-usuari', [LoginController::class, 'loginUsuari'])->name('login-usuari');

// REGISTRE

Route::get('/registre', [RegistrarController::class, 'show'])->name('registre');
Route::post('/registre', [RegistrarController::class, 'registreUsuari'])->name('registre');

//----------------- temporales pa que no pete
Route::get('/social.callback', function () {
    return view('social.callback'); 
})->name('social.callback');

Route::get('/password', function () {
    return view('password'); 
})->name('password');
// ------------------------------------------


// USUARI
// Quan l'usuari està autenticat, pot accedir a les següents rutes.
Route::middleware(['auth'])->group(function () {
    // GESTIO DE PERSONATGES ------
    Route::get('/gestio-personatges', function () {
        return view('gestioPersonatges');
    })->name('gestio-personatges');

    // INSERTAR
    Route::get('/insertar', function () {
        return view('insertar');
    })->name('insertar');

    // MODIFICAR
    Route::get('/modificar', function () {
        return view('modificar');
    })->name('modificar');

    // ESBORRAR
    Route::get('/esborrar', function () {
        return view('esborrar');
    })->name('esborrar');

    //CCONSULTAR
    Route::get('/consultar', function () {
        return view('consultar');
    })->name('consultar');

    //-----------------------------

    //ARXIU PIRATA
    Route::get('/arxiu-pirata', [ArxiuPirataController::class, 'show'])->name('arxiu-pirata');
    Route::get('/arxiu-pirata/api-pirates', [ArxiuPirataController::class, 'obtenirPirates'])->name('obtenirPirates');
    Route::get('/arxiu-pirata/api-personatges', [ArxiuPirataController::class, 'obtenirPersonatges'])->name('obtenirPersonatges');
    Route::get('/arxiu-pirata/marines', [ArxiuPirataController::class, 'obtenirMarines'])->name('obtenirMarines');


    //PERFIL
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

    //LECTOR QR
    Route::get('/lector-qr', function () {
        return view('lector-qr');
    })->name('lector-qr');

    //CANVIAR CONTRASENYA
    Route::get('/canviar-contrasenya', function () {
        return view('canviar-contrasenya');
    })->name('canviar-contrasenya');

    // LOGOUT
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    //modificar nombres porfavor
    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::middleware(['admin'])->group(function () {
        Route::get('/administrar-usuaris', function () {
            return view('administrar-usuaris');
        })->name('administrar-usuaris');
    });
});