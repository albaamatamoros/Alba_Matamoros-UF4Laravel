<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/gestio-personatges', function () {
        return view('gestio-personatges'); 
    })->name('personatges.index');

    Route::get('/arxiu-pirata', function () {
        return view('arxiu-pirata'); 
    })->name('personatges.arxiu');

    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

    Route::get('/lector-qr', function () {
        return view('lector-qr');
    })->name('lector.qr');

    Route::get('/canviar-contrasenya', function () {
        return view('canviar-contrasenya');
    })->name('canviar.contrasenya');

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/logout', function () {
        return redirect('/')->with('message', 'Sessió tancada');
    })->name('logout');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/usuaris', function () {
            return view('admin.usuaris');
        })->name('admin.usuaris');
    });
});