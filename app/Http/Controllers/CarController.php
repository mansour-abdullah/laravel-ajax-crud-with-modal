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
    public function edit($id){
        $car = car::find($id);
       return Response::json($car);
    }
    
    
    public function update(Request $request){
        $car = new car();
        $car = car::find($request['carid']);
        if($car){$car->Brand = $request['brand'];
         $car->model = $request['model'];
          $car->production_year = $request['year'];
        $car->update();
        return response()->json(['new_brand' => $car->Brand , 'new_model' => $car->model , 'new_year' => $car->production_year] , 200);
    }else{
      return refresh();
    }
    }
      public function delete($id){
          $car = car::where('id', $id)->first();
        
        $car->delete();
        // return response()->json(['done' => 'done'] , 200 );
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
