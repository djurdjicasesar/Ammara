@extends('Centaur::layout')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@section('title', 'Kategorije')

@section('content')




  <div class="row">
  <div class="col-sm-3 col-md-2 sidebar" >
  @foreach($categories as $cat)
          <ul class="nav nav-sidebar">
		  <li><a href="{{asset('products/'.$cat->slug)}}" style="font-size:15px;">{{$cat->naziv_kategorije}}<span class="sr-only">(current)</span></a></li>
		 
		  
        
	    </ul>
		@endforeach
        </div>  
		
		@foreach($products->chunk(3) as $productChunk)
		
       <div class="row">
       @foreach($productChunk as $product)
	   
       <div class="col-sm-7 col-md-3 pull-left" >
	   <div class="card pull-left" style="width:23rem; padding:10px;">
      <img class="card-img-top"><img src="{{asset('image/products/small/'.$product->slika_proizvoda)}}" alt="slika proizvoda" style="width:230px;">
      <div class="card-body">
        <h3 class="card-title">{{$product->naziv_proizvoda}}</h3>
        <p>{{$product->cijena_proizvoda}} kn</p>
		@if(Sentinel::check())
		<div class="row">
        <p align="left"><li type="button" class="btn btn-info pull-left" data-toggle="modal" data-target="#product_view{{$product->product_id}}">Detalji</li></p></div>
		
		<div class="row" align="right">
		<form action="add_cart " name="add_cart" method="post" accept-charset="UTF-8">
                <input type="hidden" name="product" value="{{route('add_cart')}}" />
                  <select name="quantity" style="width: 25%;">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select></div>{{csrf_field()}}
				<input type="hidden" name="product_id" value="{{$product->product_id}}">
				<input type="hidden" name="product_name" value="{{$product->naziv_proizvoda}}">
                <input type="hidden" name="amount" value="{{$product->cijena_proizvoda}}">
			    <input type="hidden" name="total" value="{{$product->total}}">
			  <p align="right"><button class="btn btn-success pull-right">Dodaj u košaricu</button></p>
            </form>
	<div class="modal fade product_view" id="product_view{{$product->product_id}}">
    <div class="modal-dialog">
	<div class="modal-content">
        <a href="#" data-dismiss="modal" class="close pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                
				
				<div class="modal-header">
				<h3 class="modal-title">{{$product->naziv_proizvoda}}</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <img src="{{asset('image/products/large/'.$product->slika_proizvoda)}}" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        
                        
                        <p>{{$product->opis_proizvoda}}</p>
						<p>Sastav: {{$product->sastav_proizvoda}}</p> 
                        <h3 class="cost">{{$product->cijena_proizvoda}} kn</h3>
  
                          </div>
						  
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                   <form action="add_cart" name="add_cart" method="post" accept-charset="UTF-8">
                <input type="hidden" name="product" value="{{route('add_cart')}}" />
				<div class="row"align="center">
                <select name="quantity" style="width: 10%;float:center;">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select></div>{{csrf_field()}}
				<input type="hidden" name="product_id" value="{{$product->product_id}}">
				<input type="hidden" name="product_name" value="{{$product->naziv_proizvoda}}">
                <input type="hidden" name="amount" value="{{$product->cijena_proizvoda}}">
			    <input type="hidden" name="total" value="{{$product->total}}">
              <p align="center"><button class="btn btn-success pull-right">Dodaj u košaricu</button></p>
            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		@endif
    </div>
      </div>
	  
</div>

@endforeach
</div>

@endforeach
  </div>
</div> 

</div>
 
	

@stop