<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
Route::get('/',[UserController::class,'showDataInHome'])->name('home');
Route::get('/fullpost/{id}',[UserController::class,'showFullPost'])->name('fullpost');
 Route::get('/blog', [UserController::class, 'blog'])->name('blog');

// Normal User Dashboard
Route::get('/dashboard', [UserController::class, 'userDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    

// USER POST SUBMISSION ROUTES (New Feature!)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/addpost', [UserController::class, 'userAddPost'])->name('user.addpost');
    Route::post('/user/addpost', [UserController::class, 'storeUserPost'])->name('user.storepost');
});


// Admin Protected Group
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
     Route::get('/dashboard/addpost', [AdminController::class, 'addpost'])
     ->name('admin.addpost');
     Route::post('/dashboard/addpost', [AdminController::class, 'createpost'])
     ->name('admin.createpost');
      Route::get('/dashboard/allpost', [AdminController::class, 'allpost'])
     ->name('admin.allpost');
     Route::get('/dashboard/allpost/{id}', [AdminController::class, 'updatePost'])
     ->name('admin.update');
     Route::post('/dashboard/allpost/{id}', [AdminController::class, 'postupdate'])
     ->name('admin.postupdate');
     Route::get('/dashboard/delete/{id}', [AdminController::class, 'delete'])
     ->name('admin.delete');

         // NEW: Pending Posts Approval System
    Route::get('/dashboard/pendingposts', [AdminController::class, 'pendingPosts'])->name('admin.pendingposts');
    Route::get('/dashboard/approve/{id}', [AdminController::class, 'approvePost'])->name('admin.approve');
    Route::post('/dashboard/reject/{id}', [AdminController::class, 'rejectPost'])->name('admin.reject');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
