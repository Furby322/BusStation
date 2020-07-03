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
use App\Models\Transportation;
use App\Models\TypeTransport;
use App\Models\Workers;
use App\Models\WriteOff;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
Use \Carbon\Carbon;

class QueriesController extends Controller
{
    public function query_1_car_park(CarPark $req)
    {
        $car_park = $req->with(['models:id,name','types:id,type','garages:id,name','services:id,name'])
            ->paginate(9);
        return view('kurs.queries.query_1_car_park', compact('car_park'));
    }

    public function query_2_drivers(Drivers $req, Models $req1, CarPark $car)
    {
        $drivers = $req->with
            ([
            'car_park' => function ($query){
                $query->select(['id','id_model'])
                ->with(['models:id,name']);
            }])
            ->paginate(5);

        $count = $req->count();

        $cars = $car->with('models:id,name')->get();
//        dd($car_park, $drivers);

        return view('kurs.queries.query_2_drivers', compact('drivers', 'cars','count'));
    }

    public function query_2_post(Request $req, CarPark $car)
    {
        $view = new Drivers();
        $view->models = $req->input('models');
        $drivers = new Drivers();
        $cars = $car->with('models:id,name')->find($view->models);
        $drivers_q = $drivers->with([
                        'car_park' => function ($query) use ($view) {
                        $query->select(['id','id_model'])->where('id',$view->models)
                            ->with(['models:id,name']);
                        }])->get();
//        dd($drivers_q);
        return view('kurs.queries.query_2_post', compact('drivers_q','cars'));
    }

    public function query_4_routes(Routes $req)
    {
        $routes = $req->with([
                        'car_park' => function ($query) {
                        $query->select(['id','id_model'])
                        ->with(['models:id,name']);
                        }])->paginate(2);
        return view('kurs.queries.query_4_routes', compact('routes'));
    }

    public function query_5_mileages(Mileage $req, TypeTransport $type, CarPark $car )
    {
        $mileages = $req->with([
                        'car_park' => function ($query) {
                        $query->select(['id','id_model'])
                        ->with(['models:id,name']);
                        }])->paginate(10);

        $types = $type->get();
        $car_park = $car->with(['models:id,name'])->get();

        return view('kurs.queries.query_5_mileage', compact('mileages','types','car_park'));
    }

    public function query_5_types(Request $req, Mileage $mil)
    {
        $types = $req->input('type');
        $t = new TypeTransport();
        $type_t = $t->find($types);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $mileages = $mil->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) use ($types) {
                $query->select(['id', 'id_model', 'id_type'])->where('id_type', $types)
                    ->with(['types:id,type']);
            }])->orderBy('date', 'DESC')
            ->get();

//        dd($mileages);
        return view('kurs.queries.query_5_types', compact('mileages','type_t','date1','date2'));
    }

    public function query_5_models(Request $req, Mileage $mil)
    {
        $cars = $req->input('model');
        $t = new CarPark();
        $type_t = $t->with('models:id,name')->find($cars);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $mileages = $mil->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) use ($cars) {
                $query->select(['id', 'id_model', 'id_type'])->where('id', $cars)
                    ->with(['models:id,name']);
            }])->orderBy('date', 'DESC')
            ->get();

        return view('kurs.queries.query_5_models', compact('mileages','type_t','date1','date2'));
    }

    public function query_6_repairs(Repairs $repair, CarPark $car, TypeTransport $type, Brands $brand)
    {
        $repairs = $repair->with([
                        'car_park' => function ($query) {
                        $query->select(['id','id_model','id_type'])
                        ->with([
                            'models' => function ($query1) {
                            $query1->select(['id','name','id_brand'])->with(['brands:id,name']);
                            }, 'types:id,type']);
                        }, 'workers:id,name'])
                        ->paginate(10);

        $car_park = $car->with(['models:id,name'])->get();
        $types = $type->get();
        $brands = $brand->get();

        //dd($repairs);
        return view('kurs.queries.query_6_repairs', compact('repairs','car_park','types','brands'));
    }

    public function query_6_brands(Request $req, Repairs $repair)
    {
        $brands = $req->input('brand');
        $t = new Brands();
        $type_t = $t->find($brands);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $repairs = $repair->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) use ($brands) {
                $query->select(['id','id_model','id_type'])
                    ->with([
                        'models' => function ($query1) use ($brands) {
                            $query1->select(['id','name','id_brand'])->where('id_brand',$brands)->with(['brands:id,name']);
                        }, 'types:id,type']);
            }, 'workers:id,name'])
            ->get();

        return view('kurs.queries.query_6_brands', compact('repairs','type_t','date1','date2'));
    }

    public function query_6_models(Request $req, Repairs $repair)
    {
        $models = $req->input('model');
        $t = new CarPark();
        $type_t = $t->with('models:id,name')->find($models);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $repairs = $repair->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) use ($models) {
                $query->select(['id','id_model','id_type'])->where('id_model',$models)
                    ->with([
                        'models' => function ($query1) {
                            $query1->select(['id','name']);
                        }]);
            }, 'workers:id,name'])
            ->get();

        return view('kurs.queries.query_6_models', compact('repairs','type_t','date1','date2'));
    }

    public function query_6_types(Request $req, Repairs $repair)
    {
        $types = $req->input('type');
        $t = new TypeTransport();
        $type_t = $t->find($types);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $repairs = $repair->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) use ($types) {
                $query->select(['id','id_model','id_type'])->where('id_type',$types)
                    ->with(['types:id,type']);
            }, 'workers:id,name'])
            ->get();

        return view('kurs.queries.query_6_types', compact('repairs','type_t','date1','date2'));
    }

    public function query_7_relations(Workers $worker, Masters $master, Foremans $foreman, Plot $plot)
    {
        $workers = $worker->with([
                        'foremans' => function ($query) {
                        $query->select(['id','name','id_master'])
                        ->with([
                        'masters' => function ($query1) {
                            $query1->select(['id','name','id_plot'])->with(['plots:id,name_manager']);
                        }]);
                        }])->get();

        $plots = $plot->get();
        $masters = $master->get();
        $foremans = $foreman->get();

        //dd($workers);

        return view('kurs.queries.query_7_relations', compact('workers','plots', 'masters', 'foremans'));
    }

    public function query_8_garages(Garage $garage, CarPark $carpark, TypeTransport $type)
    {
        $car = $carpark->with([
                        'garages:id,name','models:id,name','types:id,type','services:id,name'])
                        ->get();

        $types =$type->get();
        $garages = $garage->get();
        //dd($garages);
        return view('kurs.queries.query_8_garages', compact('car','types','garages'));

    }

    public function query_8_types(CarPark $carpark, Request $req)
    {
        $type = $req->input('type');
        $cars = $carpark->with([
                        'types' => function ($query) use ($type){
                        $query->select('id','type')->where('id',$type);
                        },'models:id,name','garages:id,name'])
                        ->get();

        $t = new TypeTransport();
        $type_t = $t->find($type);

        return view('kurs.queries.query_8_types', compact('cars','type_t'));
    }

    public function query_10_transportations(Transportation $tran )
    {
        $trans = $tran->with([
                        'car_park' => function ($query) {
                        $query->select('id','id_model')->with('models:id,name');
                        }])->get();

        //dd($car);
        return view('kurs.queries.query_10_transportations', compact('trans','car'));
    }

    public function query_10_models(Request $req, Transportation $tran)
    {
        $car = $req->input('model');
        $carpark = new CarPark();
        $type_t = $carpark->with('models:id,name')->find($car);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $trans = $tran->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) use ($car) {
                $query->select(['id','id_model','id_type'])->where('id',$car)
                    ->with([
                        'models' => function ($query1) {
                            $query1->select(['id','name']);
                        }]);
            }])->get();

        //dd($date2, $date1);
        return view('kurs.queries.query_10_models', compact('trans','type_t','date1','date2'));
    }

    public function query_11_details(Repairs $repair, CarPark $car, TypeTransport $type, Brands $brand)
    {
        $repairs = $repair->with([
            'car_park' => function ($query) {
                $query->select(['id','id_model','id_type'])
                    ->with([
                        'models' => function ($query1) {
                            $query1->select(['id','name','id_brand'])->with(['brands:id,name']);
                        }, 'types:id,type']);
            }])->paginate(10);

        $car_park = $car->with(['models:id,name'])->get();
        $types = $type->get();
        $brands = $brand->get();

        //dd($repairs);
        return view('kurs.queries.query_11_details', compact('repairs','car_park','types','brands'));
    }

    public function query_11_types(Request $req, Repairs $rep)
    {
        $type = $req->input('type');
        $type_y = new TypeTransport();
        $type_t = $type_y->find($type);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $types = $rep->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) use ($type) {
                $query->select(['id','id_model','id_type'])->where('id_type',$type)
                    ->with([
                        'models' => function ($query1) {
                            $query1->select(['id','name','id_brand'])->with(['brands:id,name']);
                        },'types:id,type']);
            }])->get();

        //dd($types);
        return view('kurs.queries.query_11_types', compact('types','type_t','date1','date2'));
    }

    public function query_11_brands(Request $req, Repairs $rep)
    {
        $brand = $req->input('brand');
        $type_y = new Brands();
        $type_t = $type_y->find($brand);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $brands = $rep->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) use ($brand) {
                $query->select(['id','id_model','id_type'])
                    ->with([
                        'models' => function ($query1) use ($brand) {
                            $query1->select(['id','name','id_brand'])
                                ->where('id_brand',$brand)->with(['brands:id,name']);
                        },'types:id,type']);
            }])->get();

        //dd($brands);
        return view('kurs.queries.query_11_brands', compact('brands','type_t','date1','date2'));
    }

    public function query_11_cars(Request $req, Repairs $rep)
    {
        $car = $req->input('model');
        $type_y = new CarPark();
        $type_t = $type_y->with(['models:id,name'])->find($car);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $cars = $rep->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) use ($car) {
                $query->select(['id','id_model','id_type'])->where('id',$car)
                    ->with([
                        'models' => function ($query1) {
                            $query1->select(['id','name','id_brand'])
                                ->with(['brands:id,name']);
                        },'types:id,type']);
            }])->get();

        //dd($type_t);
        return view('kurs.queries.query_11_cars', compact('cars','type_t','date1','date2'));
    }

    public function query_12_writeoffs(WriteOff $write, CarPark $car)
    {
        $writeoffs = $write->with(['models:id,name'])->get();
        $receipts = $car->with(['models:id,name'])->get();

        //dd($repairs);
        return view('kurs.queries.query_12_writeoffs', compact('writeoffs','receipts'));
    }

    public function query_12_date(WriteOff $write, CarPark $car, Request $req)
    {
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $writeoffs = $write->whereBetween('date',[$date1,$date2])->with(['models:id,name'])->get();
        $receipts = $car->whereBetween('date',[$date1,$date2])->with(['models:id,name'])->get();

        //dd($type_t);
        return view('kurs.queries.query_12_date', compact('writeoffs','receipts','date1','date2'));
    }

    public function query_13_subordinates(Workers $worker, Masters $master, Foremans $foreman, Plot $plot)
    {
        $plots = $plot->get();
        $masters = $master->get();
        $foremans = $foreman->get();

        //dd($workers);

        return view('kurs.queries.query_13_subordinates', compact('workers','plots', 'masters', 'foremans'));
    }

    public function query_13_foremans(Workers $write, CarPark $car, Request $req)
    {
        $for = $req->input('foreman');
        $fore = new Foremans();
        $foreman = $fore->find($for);
        $workers = $write->where('id_foreman',$for)->with(['foremans:id,name'])->get();

        //dd($workers);
        return view('kurs.queries.query_13_foremans', compact('workers','foreman'));
    }

    public function query_13_masters(Workers $write, Foremans $for, Request $req)
    {
        $mas = $req->input('master');
        $mast = new Masters();
        $masters = $mast->find($mas);
        $workers = $write->with(['foremans' => function ($query) use($mas){
            $query->select('id','name','id_master')->where('id_master',$mas)->with('masters:id,name');
        }])->get();
        $foremans = $for->where('id_master',$mas)->with(['masters:id,name'])->get();

        //dd($type_t);
        return view('kurs.queries.query_13_masters', compact('workers','masters','foremans'));
    }

    public function query_13_plots(Workers $write, Foremans $for, Request $req, Masters $mas)
    {
        $man = $req->input('plot');
        $plot = new Plot();
        $manager = $plot->find($man);
        $workers = $write->with(['foremans' => function ($query) use ($man){
            $query->select('id','name','id_master')->with(['masters' => function ($query1) use ($man){
                    $query1->select('id','id_plot')->where('id_plot',$man)->with(['plots:id,name_manager']);
                }]);
        }])->get();
        $foremans = $for->with(['masters' => function ($query) use ($man){
            $query->select('id','name','id_plot')->where('id_plot',$man)->with(['plots:id,name_manager']);
        }])->get();

        $masters = $mas->where('id_plot',$man)->with(['plots:id,name_manager'])->get();

        //dd($type_t);
        return view('kurs.queries.query_13_plots', compact('workers','manager','foremans','masters'));
    }

    public function query_14_repairs(Repairs $repair, Workers $wor, CarPark $car, Brands $brand)
    {
        $repairs = $repair->with([
            'car_park' => function ($query) {
                $query->select(['id','id_model','id_type'])
                    ->with([
                        'models' => function ($query1) {
                            $query1->select(['id','name','id_brand'])->with(['brands:id,name']);
                        }, 'types:id,type']);
            }, 'workers:id,name'])
            ->get();

        $workers = $wor->get();
        $cars = $car->with('models:id,name')->get();

        //dd($repairs);
        return view('kurs.queries.query_14_repairs', compact('repairs','workers','cars'));
    }

    public function query_14_cars(Request $req, Repairs $repair)
    {
        $cars = $req->input('car');
        $c = new CarPark();
        $type_c = $c->with('models:id,name')->find($cars);
        $workers = $req->input('worker');
        $w = new Workers();
        $type_w = $w->find($workers);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $repairs = $repair->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) use ($cars) {
                $query->select(['id','id_model'])->where('id',$cars)
                    ->with(['models:id,name']);
            }, 'workers' => function ($query1) use ($workers) {
                $query1->select(['id','name'])
                    ->where('id',$workers);}])
            ->get();

        return view('kurs.queries.query_14_cars', compact('repairs','type_c','date1','date2','type_w'));
    }

    public function query_14_workers(Request $req, Repairs $repair)
    {
        $workers = $req->input('worker');
        $w = new Workers();
        $type_w = $w->find($workers);
        $date1 = $req->input('date1');
        if ($date1 == null) { $date1 = '1990-01-01';}
        $date2 = $req->input('date2');
        if ($date2 == null) { $date2 = Carbon::now();}
        $repairs = $repair->whereBetween('date',[$date1,$date2])->with([
            'car_park' => function ($query) {
                $query->select(['id','id_model'])
                    ->with(['models:id,name']);
            }, 'workers' => function ($query1) use ($workers) {
                $query1->select(['id','name'])
                    ->where('id',$workers);}])
            ->get();

        return view('kurs.queries.query_14_workers', compact('repairs','type_c','date1','date2','type_w'));
    }
}
