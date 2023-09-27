<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// -------- Self Added
// For using a Controller in a route, we need to import it first
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;


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



//---------- User Routes
Route::get('/', function () {
    return view('user.create', ['heading' => 'Sign Up Page']);
})->name('create-user');
Route::get('/login', function () {
    return view('user.signin', ['heading' => 'Sign In']);
})->name('login');


// -------------------------------- Post Routes
Route::post('/user/create', [UserController::class, 'store'])->name('userstore');
Route::post('/user/auth', [UserController::class, 'authuser'])->name('usercheck');
Route::post('/user/logout', [UserController::class, 'LogOut'])->name('logout');





// ------------ Post Routes
Route::get('/posts', [PostController::class, 'index'])->name('blog.index');

Route::get('/blogs/{id}', [PostController::class, 'show'])->name('blog.show');

Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');

Route::post('/blog/create', [PostController::class, 'store'])->name('blog.store');

Route::get('/blog/{id}/edit', [PostController::class, 'edit'])->name('blog.edit');

Route::post('/blog/edit', [PostController::class, 'update'])->name('blog.update');

Route::get('/blog/delete/{id}', [PostController::class, 'destroy'])->name('blog.delete');

Route::get('/contact', function () {
    return view('contact', ['heading' => 'This is Contact Page.']);
})->name('contact');


Route::get('/about', function () {
    return view('about', ['heading' => 'This is About Page.']);
})->name('about');

// -------- Comments Routes
Route::post('/posts',[CommentController::class,'store'])->name('comment.store');
