<?php

namespace App\Http\Controllers;

use App\Models\t_tiki;
use Illuminate\Http\Request;

class Midtermcontroller extends Controller
{
    public function getProducts()
    {
        $products = t_tiki::all();
        return response()->json($products);
    }
    public function addProduct(Request $request)
    {
        $product = new t_tiki();
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->price = intval($request->input('price'));
        $product->description = $request->input('description');
        $product->sale = intval($request->input('sale'));
        $product->sold = intval($request->input('sold'));
        $product->save();
        return $product;
    }

    public function uploadImage(Request $request)
    {
        // process image							
        if ($request->hasFile('uploadImage')) {
            $file = $request->file('uploadImage');
            $fileName = $file->getClientOriginalName();
            $file->move('source/image/product', $fileName);
            return response()->json(["message" => "ok"]);
        } else return response()->json(["message" => "false"]);
    }
}
