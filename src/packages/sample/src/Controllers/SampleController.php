<?php

namespace Sample\Controllers;

use App\Http\Controllers\Controller;
use Sample\Models\Sample;

class SampleController extends Controller
{
    public function index(){
        
        $obj_sample = new Sample();
        
        $samples = $obj_sample->get_list();
        
        $data = array(
            'samples' => $samples,
        );
        return view('sample::welcome')->with($data);
    }
}
