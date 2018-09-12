<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Session;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
	   if($request->isMethod('post')){
		$data=$request->all();
		$category=new Category();
		$category->naziv_kategorije=$data['naziv_kategorije'];
		$category->slug=$data['slug'];
		$category->save();
		Session::flash('success','Kategorija uspješno dodana!');
		return redirect()->back();
	}

		return view('products.add_category'); 
	
}
   
		
    public function viewCategories(){
		
		$categories=Category::get();
		
		return view('view_categories')->with(compact('categories'));
	}
    
}