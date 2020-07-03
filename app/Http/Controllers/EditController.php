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

class EditController extends Controller
{
    public function edit_type_transport($id)
    {
        $types = TypeTransport::find($id);

        return view('kurs.edit.edit_type_transport', compact('types'));
    }

    public function edit_plot($id)
    {
        $plots = Plot::find($id);

        return view('kurs.edit.edit_plot', compact('plots'));
    }

    public function edit_master($id)
    {
        $masters = Masters::find($id);
        $plots = Plot::get();

        return view('kurs.edit.edit_master', compact('masters','plots'));
    }

    public function edit_foreman($id)
    {
        $foremans = Foremans::find($id);
        $masters = Masters::get();

        return view('kurs.edit.edit_foreman', compact('foremans','masters'));
    }

    public function edit_worker($id)
    {
        $workers = Workers::find($id);
        $foremans = Foremans::get();

        return view('kurs.edit.edit_worker', compact('workers','foremans'));
    }

    public function edit_service($id)
    {
        $services = ServiceWorkshop::find($id);
        $plots = Plot::get();

        return view('kurs.edit.edit_service_workshop', compact('services','plots'));
    }

    public function edit_garage($id)
    {
        $garages = Garage::find($id);
        $plots = Plot::get();

        return view('kurs.edit.edit_garage', compact('garages','plots'));
    }

    public function edit_brand($id)
    {
        $brands = Brands::find($id);

        return view('kurs.edit.edit_brand', compact('brands'));
    }

    public function edit_model($id)
    {
        $models = Models::find($id);
        $brands = Brands::get();

        return view('kurs.edit.edit_model', compact('models','brands'));
    }

    public function edit_car_park($id)
    {
        $car_park = CarPark::find($id);
        $models = Models::get();
        $types = TypeTransport::get();
        $garages = Garage::get();
        $services = ServiceWorkshop::get();


        return view('kurs.edit.edit_car_park', compact('car_park',
            'models','types','garages','services'));
    }

    public function edit_driver($id)
    {
        $drivers = Drivers::find($id);
        $car_parks = CarPark::with('models:id,name')->get();

        return view('kurs.edit.edit_driver', compact('drivers','car_parks'));
    }

    public function edit_mileage($id)
    {
        $mileages = Mileage::find($id);
        $car_parks = CarPark::with('models:id,name')->get();

        return view('kurs.edit.edit_mileage', compact('mileages','car_parks'));
    }

    public function edit_route($id)
    {
        $routes = Routes::find($id);
        $car_parks = CarPark::with('models:id,name')->get();


        return view('kurs.edit.edit_route', compact('routes','car_parks'));
    }

    public function edit_transportation($id)
    {
        $transportations = Transportation::find($id);
        $car_parks = CarPark::with('models:id,name')->get();

        return view('kurs.edit.edit_transportation', compact('transportations','car_parks'));
    }

    public function edit_repair($id)
    {
        $repairs = Repairs::find($id);
        $car_parks = CarPark::with('models:id,name')->get();
        $workers = Workers::get();

        return view('kurs.edit.edit_repair', compact('repairs','car_parks','workers'));
    }

    public function edit_write_off($id)
    {
        $write_offs = WriteOff::find($id);
        $models = Models::get();

        return view('kurs.edit.edit_write_off', compact('write_offs','models'));
    }
}
