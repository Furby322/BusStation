<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact',['view','']);
})->name('contact');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/body', function () {
    return view('body');
})->name('body');

Route::post('/inc.aside',function () {
    return view('contact');
})->name('contact_1');

Route::post('/contact','ContactController@view')->name('contact_2');

Route::get('/error', function () {
    return view('error');
})->name('error');

Route::get('/contact/all','ContactController@allData')->name('contact-data');
Route::post('/contact/submit','ContactController@submit')->name('contact-form');

Route::get('/lab2','ContactController@lab2_view')->name('lab2_view');

Route::get('/add_author','ContactController@add_author_view')->name('add_author_view');
Route::post('/add_author1','ContactController@add_author1_post')->name('add_author1_post');
Route::post('/add_author','ContactController@add_author_post')->name('add_author_post');
Route::post('/add_books','ContactController@add_books_post')->name('add_books_post');
Route::post('/add_janrs','ContactController@add_janrs_post')->name('add_janr_post');

Route::get('/del/author','ContactController@del_author_view')->name('del_author_view');
Route::post('/del/author','ContactController@del_author_post')->name('del_author_post');

Route::post('/search/book','ContactController@search_book_post')->name('search_book_post');

Route::get('/lab3','ContactController@lab3_index_view')->name('lab3_index_view');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['status','auth']], function ()
{
    Route::get('/lab3/autors/{id}/edit','ContactController@lab3_autors_edit')->name('lab3_autors_edit');
    Route::put('/lab3/autors/{id}/update','ContactController@lab3_autors_update')->name('lab3_autors_update');
    Route::delete('/lab3/autors/{id}/destroy','ContactController@lab3_autors_destroy')->name('lab3_autors_destroy');

    Route::get('/lab3/books/{id}/edit','ContactController@lab3_books_edit')->name('lab3_books_edit');
    Route::put('/lab3/books/{id}/update','ContactController@lab3_books_update')->name('lab3_books_update');
    Route::delete('/lab3/books/{id}/destroy','ContactController@lab3_books_destroy')->name('lab3_books_destroy');

    Route::get('/lab3/janrs/{id}/edit','ContactController@lab3_janrs_edit')->name('lab3_janrs_edit');
    Route::put('/lab3/janrs/{id}/update','ContactController@lab3_janrs_update')->name('lab3_janrs_update');
    Route::delete('/lab3/janrs/{id}/destroy','ContactController@lab3_janrs_destroy')->name('lab3_janrs_destroy');

    Route::post('/add/type_transport','AddController@add_type_transport')->name('add_type_transport');
    Route::post('/add/plot','AddController@add_plot')->name('add_plot');
    Route::post('/add/master','AddController@add_master')->name('add_master');
    Route::post('/add/foreman','AddController@add_foreman')->name('add_foreman');
    Route::post('/add/worker','AddController@add_worker')->name('add_worker');
    Route::post('/add/service','AddController@add_service')->name('add_service');
    Route::post('/add/garage','AddController@add_garage')->name('add_garage');
    Route::post('/add/brand','AddController@add_brand')->name('add_brand');
    Route::post('/add/model','AddController@add_model')->name('add_model');
    Route::post('/add/car_park','AddController@add_car_park')->name('add_car_park');
    Route::post('/add/driver','AddController@add_driver')->name('add_driver');
    Route::post('/add/mileage','AddController@add_mileage')->name('add_mileage');
    Route::post('/add/route','AddController@add_route')->name('add_route');
    Route::post('/add/transportation','AddController@add_transportation')->name('add_transportation');
    Route::post('/add/repair','AddController@add_repair')->name('add_repair');
    Route::post('/add/write_off','AddController@add_write_off')->name('add_write_off');

    Route::delete('/destroy/type_transport/{id}','DestroyController@destroy_type_transport')->name('destroy_type_transport');
    Route::delete('/destroy/plot/{id}','DestroyController@destroy_plot')->name('destroy_plot');
    Route::delete('/destroy/master/{id}','DestroyController@destroy_master')->name('destroy_master');
    Route::delete('/destroy/foreman/{id}','DestroyController@destroy_foreman')->name('destroy_foreman');
    Route::delete('/destroy/worker/{id}','DestroyController@destroy_worker')->name('destroy_worker');
    Route::delete('/destroy/service/{id}','DestroyController@destroy_service')->name('destroy_service');
    Route::delete('/destroy/garage/{id}','DestroyController@destroy_garage')->name('destroy_garage');
    Route::delete('/destroy/brand/{id}','DestroyController@destroy_brand')->name('destroy_brand');
    Route::delete('/destroy/model/{id}','DestroyController@destroy_model')->name('destroy_model');
    Route::delete('/destroy/car_park/{id}','DestroyController@destroy_car_park')->name('destroy_car_park');
    Route::delete('/destroy/driver/{id}','DestroyController@destroy_driver')->name('destroy_driver');
    Route::delete('/destroy/mileage/{id}','DestroyController@destroy_mileage')->name('destroy_mileage');
    Route::delete('/destroy/route/{id}','DestroyController@destroy_route')->name('destroy_route');
    Route::delete('/destroy/transportation/{id}','DestroyController@destroy_transportation')->name('destroy_transportation');
    Route::delete('/destroy/repair/{id}','DestroyController@destroy_repair')->name('destroy_repair');
    Route::delete('/destroy/write_off/{id}','DestroyController@destroy_write_off')->name('destroy_write_off');

    Route::get('/edit/type_transport/{id}','EditController@edit_type_transport')->name('edit_type_transport');
    Route::get('/edit/plot/{id}','EditController@edit_plot')->name('edit_plot');
    Route::get('/edit/master/{id}','EditController@edit_master')->name('edit_master');
    Route::get('/edit/foreman/{id}','EditController@edit_foreman')->name('edit_foreman');
    Route::get('/edit/worker/{id}','EditController@edit_worker')->name('edit_worker');
    Route::get('/edit/service/{id}','EditController@edit_service')->name('edit_service');
    Route::get('/edit/garage/{id}','EditController@edit_garage')->name('edit_garage');
    Route::get('/edit/brand/{id}','EditController@edit_brand')->name('edit_brand');
    Route::get('/edit/model/{id}','EditController@edit_model')->name('edit_model');
    Route::get('/edit/car_park/{id}','EditController@edit_car_park')->name('edit_car_park');
    Route::get('/edit/driver/{id}','EditController@edit_driver')->name('edit_driver');
    Route::get('/edit/mileage/{id}','EditController@edit_mileage')->name('edit_mileage');
    Route::get('/edit/route/{id}','EditController@edit_route')->name('edit_route');
    Route::get('/edit/transportation/{id}','EditController@edit_transportation')->name('edit_transportation');
    Route::get('/edit/repair/{id}','EditController@edit_repair')->name('edit_repair');
    Route::get('/edit/write_off/{id}','EditController@edit_write_off')->name('edit_write_off');

    Route::put('/update/type_transport/{id}','UpdateController@update_type_transport')->name('update_type_transport');
    Route::put('/update/plot/{id}','UpdateController@update_plot')->name('update_plot');
    Route::put('/update/master/{id}','UpdateController@update_master')->name('update_master');
    Route::put('/update/foreman/{id}','UpdateController@update_foreman')->name('update_foreman');
    Route::put('/update/worker/{id}','UpdateController@update_worker')->name('update_worker');
    Route::put('/update/service/{id}','UpdateController@update_service')->name('update_service');
    Route::put('/update/garage/{id}','UpdateController@update_garage')->name('update_garage');
    Route::put('/update/brand/{id}','UpdateController@update_brand')->name('update_brand');
    Route::put('/update/model/{id}','UpdateController@update_model')->name('update_model');
    Route::put('/update/car_park/{id}','UpdateController@update_car_park')->name('update_car_park');
    Route::put('/update/driver/{id}','UpdateController@update_driver')->name('update_driver');
    Route::put('/update/mileage/{id}','UpdateController@update_mileage')->name('update_mileage');
    Route::put('/update/route/{id}','UpdateController@update_route')->name('update_route');
    Route::put('/update/transportation/{id}','UpdateController@update_transportation')->name('update_transportation');
    Route::put('/update/repair/{id}','UpdateController@update_repair')->name('update_repair');
    Route::put('/update/write_off/{id}','UpdateController@update_write_off')->name('update_write_off');



});

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/lab3/autors','ContactController@lab3_autors_view')->name('lab3_autors_view');

    Route::get('/lab3/books','ContactController@lab3_books_view')->name('lab3_books_view');

    Route::get('/lab3/janrs','ContactController@lab3_janrs_view')->name('lab3_janrs_view');

    Route::get('/table/type_transports','ViewController@table_type_transports')->name('table_type_transports');
    Route::get('/table/plots','ViewController@table_plots')->name('table_plots');
    Route::get('/table/masters','ViewController@table_masters')->name('table_masters');
    Route::get('/table/foremans','ViewController@table_foremans')->name('table_foremans');
    Route::get('/table/workers','ViewController@table_workers')->name('table_workers');
    Route::get('/table/service_workshops','ViewController@table_service_workshops')->name('table_service_workshops');
    Route::get('/table/garages','ViewController@table_garages')->name('table_garages');
    Route::get('/table/brands','ViewController@table_brands')->name('table_brands');
    Route::get('/table/models','ViewController@table_models')->name('table_models');
    Route::get('/table/car_park','ViewController@table_car_park')->name('table_car_park');
    Route::get('/table/drivers','ViewController@table_drivers')->name('table_drivers');
    Route::get('/table/mileages','ViewController@table_mileages')->name('table_mileages');
    Route::get('/table/routes','ViewController@table_routes')->name('table_routes');
    Route::get('/table/transportations','ViewController@table_transportations')->name('table_transportations');
    Route::get('/table/repairs','ViewController@table_repairs')->name('table_repairs');
    Route::get('/table/write_offs','ViewController@table_write_offs')->name('table_write_offs');

    Route::get('/query/1/car_park','QueriesController@query_1_car_park')->name('query_1');
    Route::get('/query/2/drivers','QueriesController@query_2_drivers')->name('query_2');
    Route::post('/query/2/drivers','QueriesController@query_2_post')->name('query_2_post');
    Route::get('/query/4/routes','QueriesController@query_4_routes')->name('query_4');
    Route::get('/query/5/mileages','QueriesController@query_5_mileages')->name('query_5');
    Route::post('/query/5/types','QueriesController@query_5_types')->name('query_5_types');
    Route::post('/query/5/models','QueriesController@query_5_models')->name('query_5_models');
    Route::get('/query/6/repairs','QueriesController@query_6_repairs')->name('query_6');
    Route::post('/query/6/brands','QueriesController@query_6_brands')->name('query_6_brands');
    Route::post('/query/6/types','QueriesController@query_6_types')->name('query_6_types');
    Route::post('/query/6/models','QueriesController@query_6_models')->name('query_6_models');
    Route::get('/query/7/relations','QueriesController@query_7_relations')->name('query_7');
    Route::get('/query/8/garages','QueriesController@query_8_garages')->name('query_8');
    Route::post('/query/8/types','QueriesController@query_8_types')->name('query_8_types');
    Route::get('/query/10/transportations','QueriesController@query_10_transportations')->name('query_10');
    Route::post('/query/10/models','QueriesController@query_10_models')->name('query_10_models');
    Route::get('/query/11/details','QueriesController@query_11_details')->name('query_11');
    Route::post('/query/11/types','QueriesController@query_11_types')->name('query_11_types');
    Route::post('/query/11/cars','QueriesController@query_11_cars')->name('query_11_cars');
    Route::post('/query/11/brands','QueriesController@query_11_brands')->name('query_11_brands');
    Route::get('/query/12/writeoffs','QueriesController@query_12_writeoffs')->name('query_12');
    Route::post('/query/12/date','QueriesController@query_12_date')->name('query_12_date');
    Route::get('/query/13/subordinates','QueriesController@query_13_subordinates')->name('query_13');
    Route::post('/query/13/foremans','QueriesController@query_13_foremans')->name('query_13_foremans');
    Route::post('/query/13/masters','QueriesController@query_13_masters')->name('query_13_masters');
    Route::post('/query/13/plots','QueriesController@query_13_plots')->name('query_13_plots');
    Route::get('/query/14/repairs','QueriesController@query_14_repairs')->name('query_14');
    Route::post('/query/14/workers','QueriesController@query_14_workers')->name('query_14_workers');
    Route::post('/query/14/cars','QueriesController@query_14_cars')->name('query_14_cars');
});

Route::get('/welcome/kurs','ViewController@welcome_kurs')->name('welcome_kurs');





