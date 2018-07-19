<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class Inventory extends Controller
{
    public function index()
    {
        return view('inventory', ['items' => Item::orderBy('name')->get()]);
    }

    public function store(Request $request) 
    {
        $this->ValidateItems($request);
        $id = Item::create($request->all())->toArray()['id'];
        if (isset($request->image)) {
            $this->uploadProfilePic($request, $id);
        }
        return redirect('/inventory');
    }

    public function update(Request $request) 
    {
        $this->ValidateItems($request);
        Item::find($request->id)->update($request->all());
        if (isset($request->image)) {
            $this->uploadProfilePic($request, $request->id);
        }
        return redirect('/inventory');
    }

    public function show($id) 
    {
        Item::find($id)->delete();
        return redirect('/inventory');
    }

    public function uploadProfilePic($request, $id)
    {
        $image = $request->file('image');
        $image_name = $id . '_item.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/item_pics'), $image_name);
        Item::find($id)->update(['image' => $image_name]);
    }

    public function ValidateItems($request) {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|between:0,99.99',
            'original_price' => 'required|between:0,99.99',
            'retail_price' => 'required|between:0,99.99',
            'sold' => 'required|between:0,99.99',
            'name' => 'required|max:100',
            'description' => 'required',
        ]);
    }
}
