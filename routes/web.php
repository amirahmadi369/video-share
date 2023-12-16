<?php
use App\Notifications\VideoProcessed;
use App\Listeners\SendEmail;
use App\Events\VideoCreated;
use App\Models\User;
use App\Models\Video;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CategoryVideoController;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use App\jobs\ProcessVideo;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');
Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::post('/videos/{video}', [VideoController::class, 'update'])->name('videos.update');

Route::get('/categories/{category:slug}/videos', [CategoryVideoController::class, 'index'])->name('categories.videos.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
// Route::get('/email' ,function() {
//     $user = User::first();
//     return new VerifyEmail($user);
// });

Route::get('/verify/{id}' ,  function(){
    dd(request()->hasValidSignature());
    echo "verify";
})->name('verify'); 

Route::get('generate', function(){
    echo  URL::temporarySignedRoute('verify', now()->addMinutes(30), ['id' => 5]);

});
Route::get('/jobs', function() {
    otp::dispatch();
});
Route::get('/email' ,function(){
    Mail::to('amir@gmail.com')->send (new VerifyEmail(User::first()));
});
Route::get('/event' ,function(){
    $video = Video::first();
    VideoCreated::dispatch($video);
});
Route::get('/notify', function () {
    $user = User::first();
    $video = Video::first();
    $user->notify(new VideoProcessed($video));
});