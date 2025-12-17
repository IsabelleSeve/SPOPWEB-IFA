<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/registrar', function () {
    return view('registrar');
});

Route::post('/registrar', function (Request $request) {

    $request->validate([
        'nome' => 'required',
        'sobrenome' => 'required',
    ]);

    Registro::create([
        'nome' => $request->nome,
        'sobrenome' => $request->sobrenome,
    ]);

    return redirect('/registrar')->with('success', 'Registro salvo com sucesso!');
});

require __DIR__.'/auth.php';
