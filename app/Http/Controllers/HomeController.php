<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Banner;
use App\Models\Sales;
use App\Models\Service;
use App\Models\Social;
class HomeController extends Controller
{
    public function dashboard(Request $request){
        $data['page_title'] = 'Dashboard';
        
		return view('dashboard',$data);
    }

    public function home(Request $request){
        $data['page_title'] = 'Home';
        $data['banner'] = Banner::get();
        $data['about'] = About::first();
        $data['service'] = Service::get();
        $data['social'] = Social::first();
        $data['sales'] = Sales::first();

        return view('landing.home',$data);
    }
}
