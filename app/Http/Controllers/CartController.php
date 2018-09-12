<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Session;
use App\Product;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		 
		$session_id=Session::get('session_id');
		$usercart=DB::table('cart')->where(['session_id'=>$session_id])->get();
		foreach($usercart as $key=>$product){
			$productDetails=Product::where('product_id',$product->product_id)->first();
			$usercart[$key]->slika_proizvoda=$productDetails->slika_proizvoda;
		}
		return view('cart.index')->with(compact('usercart'));
		
	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $cart= \App\Cart::find($id);
        $cart->quantity=$request->get('quantity');
		$cart->amount=$request->get('amount');
		$cart->total=$request->get('total');
        $cart->save();
        return redirect('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = \App\Cart::find($id);
        $cart->delete();
        return redirect('cart.index')->with('success','Proizvod je izbrisan');
    }
	
}
