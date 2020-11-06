<?php

use Illuminate\Support\Facades\Route;
use App\Events\OrderStatusUpdate;

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

/* For testing pusher */
class Order
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}

Route::get('/', function () {
    OrderStatusUpdate::dispatch(new Order(1));

    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
