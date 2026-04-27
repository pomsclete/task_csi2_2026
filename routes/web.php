<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return redirect(route('login', absolute: false));
});

Route::get('/register', function () {
    return redirect(route('login', absolute: false));
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified', 'role:admin'])->name('admin.dashboard');
Route::get('/employe/dashboard', [EmployeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])->name('employe.dashboard');
// Afficher les taches de l'employé
Route::get('/mes-taches', [EmployeController::class, 'mesTaches'])
    ->middleware(['auth', 'verified'])->name('employe.mes-taches');
// Ajouter une tache
Route::post('/add-task',[EmployeController::class,'addTache'])
    ->middleware(['auth', 'verified'])->name('employe.add-tache');
// Changer le status d'une tache
Route::get('/change-status/{id}/{status}',[EmployeController::class,'ChangeStatus'])
    ->middleware(['auth', 'verified'])->name('employe.change-status');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
