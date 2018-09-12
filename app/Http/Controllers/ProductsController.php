<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Image;
use App\Category;
use App\Product;
use App\Order;
use DB;

class ProductsController extends Controller
{
	
    public function addProduct(Request $request){
		if($request->isMethod('post')){
		   $data=$request->all();
		   //echo"<pre>";print_r($data);die;
           $product=new Product;
		   $product->kategorija_proizvoda=$data['kategorija_proizvoda'];
		   $product->naziv_proizvoda=$data['naziv_proizvoda'];
		   $product->cijena_proizvoda=$data['cijena_proizvoda'];
		   $product->opis_proizvoda=$data['opis_proizvoda'];
		   $product->sastav_proizvoda=$data['sastav_proizvoda'];
		   $product->product_keywords=$data['product_keywords'];
		   //Upload Images
		   if($request->hasFile('slika_proizvoda')){
			   $image_tmp=Input::file('slika_proizvoda');
			  
		   if($image_tmp->isValid()){
			   
			   $extension=$image_tmp->getClientOriginalExtension();
			   $filename=rand(111,99999).'.'.$extension;
			   $large_image_path='image/products/large/'.$filename;
			   $medium_image_path='image/products/medium/'.$filename;
			   $small_image_path='image/products/small/'.$filename;
			   //Resize Images
			   Image::make($image_tmp)->save($large_image_path);
			   Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
			   Image::make($image_tmp)->resize(300,300)->save($small_image_path);
			   //Store image name in products table
			   $product->slika_proizvoda=$filename;
		   }
		   }
		   $product->save();
		   Session::flash('success', 'Proizvod je dodan!');
		   return redirect()->back();
		}
		$categories=Category::where(['parent_id'=>0])->get();
		$categories_dropdown="<option selected disabled>Odaberite kategoriju</option>";
		foreach($categories as $cat){
			$categories_dropdown.="<option value='".$cat->id_kategorije."'>".$cat->naziv_kategorije."</option>"; 
		} 
		return view('products.add_product')->with(compact('categories_dropdown'));
	}
	public function viewProducts(){
		
		$products=Product::orderBy('kategorija_proizvoda')->get();
		$categories=Category::where(['parent_id'=>0])->get();
	
	    return view('products.view_products')->with(compact('products','categories'));	
	}
	
	public function products($slug=null)
	{
	  $categories=Category::where(['parent_id'=>0])->get();
	  $categoryDetails=Category::where(['slug'=>$slug])->first();
      $products=Product::where(['kategorija_proizvoda'=>$categoryDetails->id_kategorije])->get();
	  
return view('products.listing')->with(compact('categories','categoryDetails','products'));
	}
	public function addToCart(Request $request)
	{   
	    $data=$request->all();
		$session_id=Session::get('session_id');
		if(empty($session_id)){
		$session_id=str_random(40);
		Session::put('session_id',$session_id);
		}
		DB::table('cart')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],
		'quantity'=>$data['quantity'],'amount'=>$data['amount'],'total'=>($data['amount']*$data['quantity']),'session_id'=>$session_id]);
	  Session::flash('success', 'Proizvod je dodan u košaricu!');
	  return redirect()->back();
	}
	
	
	
	
}

