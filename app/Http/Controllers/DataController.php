<?php

namespace App\Http\Controllers;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function add(Request $request,int $limit=1){
        for ($i=1; $i <= $limit; $i++) { 
            $time=time();
            Data::create([
                'name' => 'Name '.$time.$i,
                'age' => 'age '.$time.$i,
                'address' => 'address '.$time.$i,
                'mobile' => 'mobile '.$time.$i,
                'test' => rand(0,1000)
            ]);
        }
        return response()->Json(['result' => 'added']);
    }
    public function show(int $limit=1){
        $data= Data::limit($limit)->get();
         return response()->Json(['result' => $data]);
     }
     public function get(string $condition='equal',int $test=0,int $limit=1){
        $data= Data::limit($limit);
        if ($condition == 'less') {
            $data=$data->where('test','<',$test);
        } elseif($condition == 'grater') {
            $data=$data->where('test','>',$test);
        } else {
            $data=$data->where('test',$test);
        }
        
        $data=$data->get();
         return response()->Json(['result' => $data]);
     }
}
