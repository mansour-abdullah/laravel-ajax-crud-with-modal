<?php

namespace App\Http\Controllers;
use  Validator, Response, Redirect;
use Illuminate\Support\Facades\Input; 
use Illuminate\Http\Request;
use App\car;
use App\Http\Requests;

    class CarController extends Controller
    {

    public function index(){
    $cars = car::all();
    return view('cars' , ['cars' => $cars]); 
    }

    //sending the data to the modal`s form via JSON    
    public function edit($id){
    $car = car::find($id);
    return Response::json($car);
    }

    //updating the data via ajax requests
    public function update(Request $request){
    $car = new car();
    $car = car::find($request['carid']);
    $car->Brand = $request['brand'];
    $car->model = $request['model'];
    $car->production_year = $request['year'];
    $car->update();
        
    //retruning response with updated data
    return response()->json(['new_brand' => $car->Brand , 'new_model' => $car->model , 'new_year' => $car->production_year] , 200);

    }
        
    public function delete($id){
        
    $car = car::where('id', $id)->first();
    $car->delete();

    }

    public function add(){
    $car = new car();
    $car->Brand = Input::get('brand');
    $car->model = Input::get('model');
    $car->production_year = Input::get('year');
    $car->save();
    $car = car::find($car->id);
    return response()->json(['new_id'=> $car->id,'new_brand' => $car->Brand , 'new_model' => $car->model , 'new_year' => $car->production_year] , 200);

    }

    }
