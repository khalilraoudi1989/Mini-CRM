use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    // Jetstream's routes for login, registration, etc.
    require_once __DIR__.'/auth/jetstream.php';

    // The following route is optional and can be used for account verification
    Route::get('/email/verify/{id}/{hash}', [Laravel\Fortify\Http\Controllers\VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    // Jetstream's routes for account settings, two-factor authentication, etc.
    require_once __DIR__.'/auth/fortify.php';
});