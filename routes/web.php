<?php

use App\Http\Controllers\AdministrarUsuarisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\ArxiuPirataController;
use App\Http\Controllers\CanviarContrasenyaController;
use App\Http\Controllers\InsertarController;
use App\Http\Controllers\ModificarController;
use App\Http\Controllers\CercaController;
use App\Http\Controllers\ConsultarController;
use App\Http\Controllers\EsborrarController;
use App\Http\Controllers\LectorQRController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PersonatgeController;
use App\Http\Controllers\AuthController;

// --------------------------------------------
// INDEX

Route::get('/', [PersonatgeController::class, 'show'])->name('index');

// LOGIN

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/loginUsuari', [LoginController::class, 'loginUsuari'])->name('loginUsuari');

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('authGoogle');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// REGISTRE

Route::get('/registre', [RegistrarController::class, 'show'])->name('registre');
Route::post('/registreUsuari', [RegistrarController::class, 'registreUsuari'])->name('registreUsuari');

// CONTRASENYA OBLIDADA

Route::get('/contrasenyaOblidada', [CanviarContrasenyaController::class, 'show2'])->name('contrasenyaOblidada');
Route::post('/contrasenyaOblidada', [CanviarContrasenyaController::class, 'contrasenyaOblidada'])->name('contrasenyaOblidada');

Route::get('restablirContrasenya/{token}', [CanviarContrasenyaController::class, 'restablirContrasenya'])->name('restablirContrasenya');

// enviar les dades del formulari per restablir la contrasenya
Route::post('/restablirCanviContrasenya/{token}', [CanviarContrasenyaController::class, 'restablirCanviContrasenya'])->name('restablirCanviContrasenya');

// ------------------------------------------

// USUARI
// Quan l'usuari està autenticat, pot accedir a les següents rutes.
Route::middleware(['auth'])->group(function () {
    // GESTIO DE PERSONATGES ------
    Route::get('/gestioPersonatges', function () {
        return view('gestioPersonatges');
    })->name('gestioPersonatges');

    // INSERTAR
    Route::get('/insertar', [InsertarController::class, 'show'])->name('insertar');
    Route::post('/insertarPersonatge', [InsertarController::class, 'insertarPersonatge'])->name('insertarPersonatge');

    // MODIFICAR PERSONATGE:
    // CERCA
    Route::get('/cercar', [CercaController::class, 'show'])->name('cercar');
    Route::post('/cercarPersonatge', [CercaController::class, 'cercarPersonatge'])->name('cercarPersonatge');

    // MODIFICAR 
    Route::get('/modificar/{nom}', [ModificarController::class, 'show'])->name('modificar');
    Route::post('/modificarPersonatge/{id}', [ModificarController::class, 'modificarPersonatge'])->name('modificarPersonatge');
    
    // ESBORRAR
    Route::get('/esborrar', [EsborrarController::class, 'show'])->name('esborrar');
    Route::post('/esborrarPersonatge', [EsborrarController::class, 'esborrarPersonatge'])->name('esborrarPersonatge');

    //Esborrar a l'inici
    Route::post('/esborrarPersonatgeInici/{id}', [EsborrarController::class, 'esborrarPersonatgeInici'])->name('esborrarPersonatgeInici');

    //CCONSULTAR
    Route::get('/consultar', [PersonatgeController::class, 'show'])->name('consultar');

    //-----------------------------

    //ARXIU PIRATA
    Route::get('/arxiuPirata', [ArxiuPirataController::class, 'show'])->name('arxiuPirata');
    Route::get('/arxiuPirata/apiPersonatges', [ArxiuPirataController::class, 'obtenirPersonatges'])->name('obtenirPersonatges');

    // PERFIL
    Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil');
    Route::post('/actualitzarPerfil', [PerfilController::class, 'actualitzarPerfil'])->name('actualitzarPerfil');

    //LECTOR QR
    Route::get('/lectorQr', [LectorQRController::class, 'show'])->name('lectorQr');

    //CANVIAR CONTRASENYA
    Route::get('/canviarContrasenya', [CanviarContrasenyaController::class, 'show'])->name('canviarContrasenya');
    Route::post('/canviarContrasenya', [CanviarContrasenyaController::class, 'canviarContrasenya'])->name('canviarContrasenyaUsuari');

    // LOGOUT
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    //ADMINISTRAR USUARIS
    Route::get('/administrarUsuaris', [AdministrarUsuarisController::class, 'show'])->name('administrarUsuaris');
    Route::delete('/esborrarUsuari/{id}', [AdministrarUsuarisController::class, 'esborrarUsuari'])->name('esborrarUsuari');
});

//----------------- temporales pa que no pete
Route::get('/social.callback', function () {
    return view('social.callback'); 
})->name('social.callback');