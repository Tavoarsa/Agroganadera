<?php
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

//Home
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'index '=>'HomeController',
]);

//Animal


Route::resource('animal','AnimalController');

//Disease

Route::resource('disease','DiseaseController');



//Farm
Route::resource('farm','FarmController');
      

//Injection

Route::resource('injection','InjecctionController');
Route::get('injections/edit/{id}','InjecctionController@edit');
Route::get('injection/show1/{id}','InjecctionController@show1');

//Vaccines

Route::resource('vaccine','VaccineController');
Route::get('vaccine/edit/{id}','VaccineController@edit');
Route::get('vaccine/show1/{id}','VaccineController@show1');

//Mail
Route::get('sendemail', function () {

    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.test', $data, function ($message) {

        $message->from('tavo.cr23@gmail.com', 'Learning Laravel');

        $message->to('tavo.cr23@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});

//Calendar

Route::resource('calendar','CalendarController');






