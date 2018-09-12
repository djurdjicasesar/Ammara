@extends('Centaur::layout')

@section('title', 'Ammara Kozmetika')

@section('banner')
<img src="{{URL::asset('/image/banner.jpg')}}" alt="banner" height="250" width="1280"/>
@stop
@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span>Vaša košarica</h5>
							</div>
							<div class="col-xs-6">
								<button type="button" class="btn btn-default btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span><a href="#">
									Nastavite s kupovinom </a>
								</button>
							</div>
						</div>
					</div>
				</div>
				@if(!empty($usercart))
				@foreach($usercart as $cart)
				<div class="panel-body">
					<div class="row">
							<div class="col-xs-2"><img class="img-responsive" src="{{asset('image/products/small/'.$cart->slika_proizvoda)}}">
						</div>
						<div class="col-xs-4 ">
							<h4 class="product-name"><strong>{{$cart->product_name}}</strong></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong>{{$cart->amount}} kn <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" class="form-control input-sm" value="{{$cart->quantity}}">
							</div>
							<div class="col-xs-2">
								
							   <form action="{{route('cart.destroy', $cart->id)}}"method="post">{{csrf_field()}}
									<button type="button" class="btn btn-link btn-xs">
									<input type="hidden" name="_method" value="delete" />
									<span class="glyphicon glyphicon-trash"> </span></a>
								</button></form>
							</div>
						</div>
					</div>
					
				
						<hr>
					<div class="row">
						<div class="text-center">
							<div class="col-xs-9">
								
							</div>
							
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right"><strong>{{$cart->amount*$cart->quantity}} kn</strong></h4>
						</div>
						</div>
						</div>
						@endforeach
					<div class="col-xs-3">
					<a href="#"class="btn btn-info btn-sm btn-block">
								
								Ažuriraj
								</a>
							</div>
							
						<div class="col-xs-3">
							<button type="button" class="btn btn-success btn-block">
								Pošalji narudžbu
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				@endif
@stop