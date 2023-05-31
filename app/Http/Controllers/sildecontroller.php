<?php

namespace App\Http\Controllers;
use App\Models\slide;
use Illuminate\Http\Request;
use App\Models\products;

class sildecontroller extends Controller
{
    public function getIndex(){	
    	$slide =Slide::all();
    	//return view('page.trangchu',['slide'=>$slide]);
        $new_product = products::where('new',1)->get();	
        $sanpham_khuyenmai=products::where('promotion_price','<>',0)->get();
    	return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
}
