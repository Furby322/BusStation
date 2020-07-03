<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\CarPark;
use App\Models\Drivers;
use App\Models\Foremans;
use App\Models\Garage;
use App\Models\Masters;
use App\Models\Mileage;
use App\Models\Models;
use App\Models\Plot;
use App\Models\Repairs;
use App\Models\Routes;
use App\Models\ServiceWorkshop;
use App\Models\Transportation;
use App\Models\TypeTransport;
use App\Models\Workers;
use App\Models\WriteOff;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function welcome_kurs()
    {
        return view('kurs.view.welcome_kurs');
    }

    public function table_type_transports()
    {
        $types = TypeTransport::paginate(2);

        return view('kurs.view.table_type_transports', compact('types'));
    }

    public function table_plots()
    {
        $plots = Plot::paginate(1);

        return view('kurs.view.table_plots', compact('plots'));
    }

    public function table_masters()
    {
        $masters = Masters::with('plots:id,name')->paginate(2);

        $plots = Plot::get();

        return view('kurs.view.table_masters', compact('masters','plots'));
    }

    public function table_foremans()
    {
        $foremans = Foremans::with('masters:id,name')->paginate(3);

        $masters = Masters::get();

        return view('kurs.view.table_foremans', compact('masters','foremans'));
    }

    public function table_workers()
    {
        $workers = Workers::with('foremans:id,name')->paginate(6);

        $foremans = Foremans::get();

        return view('kurs.view.table_workers', compact('workers','foremans'));
    }

    public function table_service_workshops()
    {
        $service_workshops = ServiceWorkshop::with('plots:id,name')->paginate(2);

        $plots = Plot::get();

        return view('kurs.view.table_service_workshops', compact('service_workshops','plots'));
    }

    public function table_garages()
    {
        $garages = Garage::with('plots:id,name')->paginate(2);

        $plots = Plot::get();

        return view('kurs.view.table_garages', compact('garages','plots'));
    }

    public function table_brands()
    {
        $brands = Brands::paginate(2);

        return view('kurs.view.table_brands', compact('brands'));
    }

    public function table_models()
    {
        $models = Models::with('brands:id,name')->paginate(3);

        $brands = Brands::get();

        return view('kurs.view.table_models', compact('models','brands'));
    }

    public function table_car_park()
    {
        $car_parks = CarPark::with(['models:id,name'],['types:id,type'],['garages:id,name'],['services:id,name'])->paginate(3);

        $models = Models::get();
        $types = TypeTransport::get();
        $garages = Garage::get();
        $services = ServiceWorkshop::get();

        return view('kurs.view.table_car_park', compact('car_parks','models', 'types', 'garages', 'services'));
    }

    public function table_drivers()
    {
        $drivers = Drivers::with([
            'car_park' => function ($query) {
                $query->select(['id','id_model'])->with(['models:id,name']);
            }])->paginate(5);

        $car_parks = CarPark::with('models:id,name')->get();

        return view('kurs.view.table_drivers', compact('drivers','car_parks'));
    }

    public function table_mileages()
    {
        $mileages = Mileage::with([
            'car_park' => function ($query) {
                $query->select(['id','id_model'])->with(['models:id,name']);
            }])->paginate(10);

        $car_parks = CarPark::with('models:id,name')->get();

        return view('kurs.view.table_mileages', compact('mileages','car_parks'));
    }

    public function table_routes()
    {
        $routes = Routes::with([
            'car_park' => function ($query) {
                $query->select(['id','id_model'])->with(['models:id,name']);
            }])->paginate(2);

        $car_parks = CarPark::with('models:id,name')->get();

        return view('kurs.view.table_routes', compact('routes','car_parks'));
    }

    public function table_transportations()
    {
        $transportations = Transportation::with([
            'car_park' => function ($query) {
                $query->select(['id','id_model'])->with(['models:id,name']);
            }])->paginate(2);

        $car_parks = CarPark::with('models:id,name')->get();

        return view('kurs.view.table_transportations', compact('transportations','car_parks'));
    }

    public function table_repairs()
    {
        $repairs = Repairs::with([
            'car_park' => function ($query) {
                $query->select(['id','id_model'])->with(['models:id,name']);
            }],['workers:id,name'])->paginate(5);

        $car_parks = CarPark::with('models:id,name')->get();
        $workers = Workers::get();

        return view('kurs.view.table_repairs', compact('repairs','car_parks','workers'));
    }

    public function table_write_offs()
    {
        $write_offs = WriteOff::with('models:id,name')->paginate(3);

        $models = Models::get();

        return view('kurs.view.table_write_offs', compact('write_offs','models'));
    }
}
