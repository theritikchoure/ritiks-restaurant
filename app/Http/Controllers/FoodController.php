<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function create_food(Request $request)
    {
        $food = $request->user();
        $food = new Food;
        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('food_images', $imagename);
        
        $food->image = $imagename;

        $food->save();

        return redirect('food-menu')->with('status', 'Food Added !!!');
    }

    public function delete_food($id)
    {
        $data = Food::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function edit_food($id)
    {
        $food = Food::find($id);

        return view('admin.editfood', compact('food'));
    }

    public function edit_food1(Request $request, $id)
    {
        $food = Food::find($id);

        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('food_images', $imagename);
        
        $food->image = $imagename;

        $food->save();

        return redirect('food-menu')->with('updated', 'Food Updated !!!');
    }
    
}
