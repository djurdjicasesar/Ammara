<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products=Product::all();
		
		$categories=Category::where(['parent_id'=>0])->get();
		
		
        return view('index')->with(compact('categories'));
    }
	public function products($slug=null)
	{
	  $categories=Category::where(['parent_id'=>0])->get();
	  $categoryDetails=Category::where(['slug'=>$slug])->first();
      $products=Product::where(['kategorija_proizvoda'=>$categoryDetails->id_kategorije])->get();
	  return view('products.listing')->with(compact('categories','categoryDetails','products'));
	}
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}

