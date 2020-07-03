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

class UpdateController extends Controller
{
    public function update_type_transport(TypeTransportAddRequest $req, $id)
    {
        $types = TypeTransport::find($id);

        $types->fill($req->all());

        $types->save();

        return redirect()->route('table_type_transports');
    }

    public function update_plot(PlotAddRequest $req, $id)
    {
        $plots = Plot::find($id);

        $plots->fill($req->all());

        $plots->save();

        return redirect()->route('table_plots');
    }

    public function update_master(MasterAddRequest $req, $id)
    {
        $masters = Masters::find($id);

        $masters->fill($req->all());

        $masters->save();

        return redirect()->route('table_masters');
    }

    public function update_foreman(ForemanAddRequest $req, $id)
    {
        $foremans = Foremans::find($id);

        $foremans->fill($req->all());

        $foremans->save();

        return redirect()->route('table_foremans');
    }

    public function update_worker(WorkerAddRequest $req, $id)
    {
        $workers = Workers::find($id);

        $workers->fill($req->all());

        $workers->save();

        return redirect()->route('table_workers');
    }

    public function update_service(ServiceAddRequest $req, $id)
    {
        $services = ServiceWorkshop::find($id);

        $services->fill($req->all());

        $services->save();

        return redirect()->route('table_service_workshops');
    }

    public function update_garage(GarageAddRequest $req, $id)
    {
        $garages = Garage::find($id);

        $garages->fill($req->all());

        $garages->save();

        return redirect()->route('table_garages');
    }

    public function update_brand(BrandAddRequest $req, $id)
    {
        $brands = Brands::find($id);

        $brands->fill($req->all());

        $brands->save();

        return redirect()->route('table_brands');
    }

    public function update_model(ModelAddRequest $req, $id)
    {
        $models = Models::find($id);

        $models->fill($req->all());

        $models->save();

        return redirect()->route('table_models');
    }

    public function update_car_park(CarParkAddRequest $req, $id)
    {
        $car_park = CarPark::find($id);

        $car_park->fill($req->all());
        $car_park->date = Carbon::now();

        $car_park->save();

        return redirect()->route('table_car_park');
    }

    public function update_driver(DriverAddRequest $req, $id)
    {
        $drivers = Drivers::find($id);

        $drivers->fill($req->all());

        $drivers->save();

        return redirect()->route('table_drivers');
    }

    public function update_mileage(MileageAddRequest $req, $id)
    {
        $mileages = Mileage::find($id);

        $mileages->fill($req->all());

        $mileages->save();

        return redirect()->route('table_mileages');
    }

    public function update_route(RouteAddRequest $req, $id)
    {
        $routes = Routes::find($id);

        $routes->fill($req->all());

        $routes->save();

        return redirect()->route('table_routes');
    }

    public function update_transportation(TransportationAddRequest $req, $id)
    {
        $transportations = Transportation::find($id);

        $transportations->fill($req->all());

        $transportations->save();

        return redirect()->route('table_transportations');
    }

    public function update_repair(RepairAddRequest $req, $id)
    {
        $repairs = Repairs::find($id);

        $repairs->fill($req->all());

        $repairs->save();

        return redirect()->route('table_repairs');
    }

    public function update_write_off(WriteOffAddRequest $req, $id)
    {
        $write_offs = WriteOff::find($id);

        $write_offs->fill($req->all());

        $write_offs->save();

        return redirect()->route('table_write_offs');
    }
}
