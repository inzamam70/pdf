<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/money-receipt', function () {
    $view = view('money-receipt')->render();

    $mpdf = new \Mpdf\Mpdf([
        'default_font_size' => 9,
        'format' => 'A4'
    ]);
    $mpdf->SetTitle('Money Receipt');
    $mpdf->WriteHTML($view);
    $mpdf->Output(time() . '-money-receipt' . ".pdf", "I");
});
