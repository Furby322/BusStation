<?php

namespace App\Http\Controllers;


use App\Http\Requests\AddRequests\BrandAddRequest;
use App\Http\Requests\AddRequests\CarParkAddRequest;
use App\Http\Requests\AddRequests\DriverAddRequest;
use App\Http\Requests\AddRequests\ForemanAddRequest;
use App\Http\Requests\AddRequests\GarageAddRequest;
use App\Http\Requests\AddRequests\MasterAddRequest;
use App\Http\Requests\AddRequests\MileageAddRequest;
use App\Http\Requests\AddRequests\ModelAddRequest;
use App\Http\Requests\AddRequests\PlotAddRequest;
use App\Http\Requests\AddRequests\RepairAddRequest;
use App\Http\Requests\AddRequests\RouteAddRequest;
use App\Http\Requests\AddRequests\ServiceAddRequest;
use App\Http\Requests\AddRequests\TransportationAddRequest;
use App\Http\Requests\AddRequests\TypeTransportAddRequest;
use App\Http\Requests\AddRequests\WorkerAddRequest;
use App\Http\Requests\AddRequests\WriteOffAddRequest;
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
use Carbon\Carbon;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function add_type_transport(TypeTransportAddRequest $req)
    {
        TypeTransport::create($req->all());

        return redirect()->route('table_type_transports')->with('success', 'Категория добавлена!');
    }

    public function add_plot(PlotAddRequest $req)
    {
        Plot::create($req->all());

        return redirect()->route('table_plots')->with('success', 'Участок добавлен!');
    }

    public function add_master(MasterAddRequest $req)
    {
        Masters::create($req->all());

        return redirect()->route('table_masters')->with('success', 'Мастер добавлен!');
    }

    public function add_foreman(ForemanAddRequest $req)
    {
        Foremans::create($req->all());

        return redirect()->route('table_foremans')->with('success', 'Бригадир добавлен!');
    }

    public function add_worker(WorkerAddRequest $req)
    {
        Workers::create($req->all());

        return redirect()->route('table_workers')->with('success', 'Рабочий добавлен!');
    }

    public function add_service(ServiceAddRequest $req)
    {
        ServiceWorkshop::create($req->all());

        return redirect()->route('table_service_workshops')->with('success', 'Цех добавлен!');
    }

    public function add_garage(GarageAddRequest $req)
    {
        Garage::create($req->all());

        return redirect()->route('table_garages')->with('success', 'Гараж добавлен!');
    }

    public function add_brand(BrandAddRequest $req)
    {
        Brands::create($req->all());

        return redirect()->route('table_brands')->with('success', 'Бренд добавлен!');
    }

    public function add_model(ModelAddRequest $req)
    {
        Models::create($req->all());

        return redirect()->route('table_models')->with('success', 'Модель добавлен!');
    }

    public function add_car_park(CarParkAddRequest $req)
    {
        $car_park = new CarPark();
        $car_park->id_model = $req->input('id_model');
        $car_park->id_type = $req->input('id_type');
        $car_park->id_garage = $req->input('id_garage');
        $car_park->id_service = $req->input('id_service');
        $car_park->date = Carbon::now();

        $car_park->save();

        return redirect()->route('table_car_park')->with('success', 'Автомобиль добавлен!');
    }

    public function add_driver(DriverAddRequest $req)
    {
        Drivers::create($req->all());

        return redirect()->route('table_drivers')->with('success', 'Водитель добавлен!');
    }

    public function add_mileage(MileageAddRequest $req)
    {
        $mileage = new Mileage();
        $mileage->mileage = $req->input('mileage');
        $mileage->id_car = $req->input('id_car');
        $mileage->date = Carbon::now();

        $mileage->save();

        return redirect()->route('table_mileages')->with('success', 'Пробег добавлен!');
    }

    public function add_route(RouteAddRequest $req)
    {
        Routes::create($req->all());

        return redirect()->route('table_routes')->with('success', 'Маршрут добавлен!');
    }

    public function add_transportation(TransportationAddRequest $req)
    {
        $transportation = new Transportation();
        $transportation->type = $req->input('type');
        $transportation->id_car = $req->input('id_car');
        $transportation->date = Carbon::now();

        $transportation->save();

        return redirect()->route('table_transportations')->with('success', 'Перевозка добавлена!');
    }

    public function add_repair(RepairAddRequest $req)
    {
        $repair = new Repairs();
        $repair->id_car = $req->input('id_car');
        $repair->id_worker = $req->input('id_worker');
        $repair->price = $req->input('price');
        $repair->detail = $req->input('detail');
        $repair->date = Carbon::now();

        $repair->save();

        return redirect()->route('table_repairs')->with('success', 'Ремонт добавлен!');
    }

    public function add_write_off(WriteOffAddRequest $req)
    {
        $writeoff = new WriteOff();
        $writeoff->id_model = $req->input('id_model');
        $writeoff->date = Carbon::now();

        $writeoff->save();

        return redirect()->route('table_write_offs')->with('success', 'Техника добавлена!');
    }


}
