<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use Facade\FlareClient\Middleware\CensorRequestBodyFields;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function user()
    {
        $user = User::where('usertype', 0)->get();
        return view('admin.users', compact('user'));
    }

    public function user_destroy($id)
    {
        User::destroy($id);

        return redirect('users')->with('status', 'User Deleted');
    }

    public function food()
    {
        $data = Food::all();
        return view('admin.food_menu', compact('data'));
    }

    public function show_reservation()
    {
        $data = Reservation::all();
        return view('admin.reservation', compact('data'));
    }

    public function view_chefs()
    {
        $chef = Chef::all();
        return view('admin.chefs', compact('chef'));
    }

    public function upload_chefs(Request $request)
    {
        $data = new Chef;

        $image = $request->image;
    
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefs_image', $imagename);

        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->facebook = $request->fburl;
        $data->twitter = $request->twurl;
        $data->instagram = $request->inurl;

        $data->save();

        return redirect()->back();
    }

    public function edit_chef($id)
    {
        $data = Chef::find($id);

        return view('admin.updatechef', compact('data'));
    }

    public function update_chef(Request $request, $id)
    {
        $data = Chef::find($id);

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefs_image', $imagename);

            $data->image = $imagename;
        }

        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->facebook = $request->fburl;
        $data->twitter = $request->twurl;
        $data->instagram = $request->inurl;

        $data->save();

        return redirect('view-chefs');
    }

    public function delete_chef($id)
    {
        $data = Chef::find($id);

        $data->delete();

        return redirect()->back();
        
    }
}

