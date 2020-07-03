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
use Illuminate\Queue\Worker;

class DestroyController extends Controller
{
    public function destroy_type_transport($id)
    {
        TypeTransport::find($id)->delete();

        return redirect()->route('table_type_transports')->with('success', 'Категория удалена!');
    }

    public function destroy_plot($id)
    {
        Plot::find($id)->delete();

        return redirect()->route('table_plots')->with('success', 'Участок удален!');
    }

    public function destroy_master($id)
    {
        Masters::find($id)->delete();

        return redirect()->route('table_masters')->with('success', 'Мастер удален!');
    }

    public function destroy_foreman($id)
    {
        Foremans::find($id)->delete();

        return redirect()->route('table_foremans')->with('success', 'Бригадир удален!');
    }

    public function destroy_worker($id)
    {
        Workers::find($id)->delete();

        return redirect()->route('table_workers')->with('success', 'Работник удален!');
    }

    public function destroy_service($id)
    {
        ServiceWorkshop::find($id)->delete();

        return redirect()->route('table_service_workshops')->with('success', 'Цех удален!');
    }

    public function destroy_garage($id)
    {
        Garage::find($id)->delete();

        return redirect()->route('table_garages')->with('success', 'Гараж удален!');
    }

    public function destroy_brand($id)
    {
        Brands::find($id)->delete();

        return redirect()->route('table_brands')->with('success', 'Бренд удален!');
    }

    public function destroy_model($id)
    {
        Models::find($id)->delete();

        return redirect()->route('table_models')->with('success', 'Модель удалена!');
    }

    public function destroy_car_park($id)
    {
        CarPark::find($id)->delete();

        return redirect()->route('table_car_park')->with('success', 'Автомобиль удален!');
    }

    public function destroy_driver($id)
    {
        Drivers::find($id)->delete();

        return redirect()->route('table_drivers')->with('success', 'Водитель удален!');
    }

    public function destroy_mileage($id)
    {
        Mileage::find($id)->delete();

        return redirect()->route('table_mileages')->with('success', 'Запись о пробеге удалена!');
    }

    public function destroy_route($id)
    {
        Routes::find($id)->delete();

        return redirect()->route('table_routes')->with('success', 'Маршрут удален!');
    }

    public function destroy_transportation($id)
    {
        Transportation::find($id)->delete();

        return redirect()->route('table_transportations')->with('success', 'Запись о перевозке удалена!');
    }

    public function destroy_repair($id)
    {
        Repairs::find($id)->delete();

        return redirect()->route('table_repairs')->with('success', 'Запись о ремонте удалена!');
    }

    public function destroy_write_off($id)
    {
        WriteOff::find($id)->delete();

        return redirect()->route('table_write_offs')->with('success', 'Списанное авто удалено!');
    }









}
