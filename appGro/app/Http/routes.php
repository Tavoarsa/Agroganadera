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
Route::get('animal/control_animal/{id}','AnimalController@control_animal');
Route::get('animal/registro_sanitario/vaccine/{id}','AnimalController@registro_sanitario_vaccine');
Route::get('animal/registro_sanitario/injection/{id}','AnimalController@registro_sanitario_injection');

Route::post('animal/registro_sanitario/ejecutar_vacunas','AnimalController@ejecutar_vacunas');
Route::post('animal/peso/ejecutar_peso','AnimalController@ejecutar_peso');
Route::post('animal/registro_sanitario/ejecutar_injection','AnimalController@ejecutar_injection');
Route::post('animal/control_alimenticio/ejecutar_alimento','AnimalController@ejecutar_alimento');


Route::get('animal/milk_production/list_milk_production/{id}','AnimalController@redirect_milk_production');
Route::get('animal/milk_production/ejecutar_milk_production/{id}','Milk_production@edit');
Route::get('animal/milk_production/{id}','AnimalController@milk_production');


Route::get('animal/peso/{id}','AnimalController@peso');
Route::get('animal/control_alimenticio/{id}','AnimalController@control_alimenticio');
//Reportes
Route::resource('report','ReportController');
Route::get('report/create/{id}','ReportController@create');



//Disease

Route::resource('disease','DiseaseController');

//Providers
Route::resource('provider','ProviderController');
Route::get('provider/edit/{id}','ProviderController@edit');



//Farm
Route::resource('farm','FarmController');
Route::get('farm/edit/{id}','FarmController@edit');
Route::get('farm/show/{id}','FarmController@show');
      

//Injection

Route::resource('injection','InjecctionController');
Route::get('injections/edit/{id}','InjecctionController@edit');
Route::get('injection/show1/{id}','InjecctionController@show1');

//Vaccines

Route::resource('vaccine','VaccineController');
Route::get('vaccine/edit/{id}','VaccineController@edit');
Route::get('vaccine/show1/{id}','VaccineController@show1');

//food__supplements

Route::resource('food__supplement','food__supplementsController');
Route::get('food__supplements/edit/{id}','food__supplementsController@edit');
Route::get('food__supplements/show1/{id}','food__supplementsController@show1');



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






