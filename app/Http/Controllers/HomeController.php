<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Chef;

class HomeController extends Controller
{

    public function index()
    {
        $food = Food::all();
        $chef = Chef::all();
        return view('welcome', compact('food', 'chef'));
    }

    public function redirects()
    {
        $food = Food::all();
        $chef = Chef::all();

        $usertype = Auth::user()->usertype;

        if($usertype === '1')
        {
            return view('admin.admin');
        }
        else
        {
            
            return view('welcome', compact('food', 'chef'));
        }
    }

    public function reservation(Request $request)
    {
        $data = new Reservation;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;    
        $data->save();

        return redirect()->back();
    }
}
