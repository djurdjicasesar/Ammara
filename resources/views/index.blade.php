@extends('Centaur::layout')

@section('title', 'Ammara Kozmetika')

@section('banner')
<img src="{{URL::asset('/image/banner.jpg')}}" alt="banner" height="250" width="1280"/>
@stop
@section('content')

  <div class="row">
 
  <div class="col-sm-3 col-md-2 sidebar" >
  @foreach($categories as $cat)
          <ul class="nav nav-sidebar">
		  <li><a href="{{asset('products/'.$cat->slug)}}" style="font-size:15px;">{{$cat->naziv_kategorije}}<span class="sr-only">(current)</span></a></li>
		 
		  
        
	    </ul>
		@endforeach
        </div>  
		

    
	 <img src="{{URL::asset('/image/content_area1.png')}}" alt="prirodni proizvodi"  />   
	  
	   <textarea rows="27" cols="21" style="font-family:arial; font-size:13; padding:2px; float:right; position:absolute; color:#4080bf;" >
U klasičnim komercijalnim kremama, pa i u onim najskupljim, 
glavni su sastojci vazelin, parafin, dimetikon (silikonsko ulje) i rafinirana biljna ulja.
 Sve su to sastojci bez hranjivih vrijednosti, teško se upijaju, opterećuju pore i 
 onemogućavaju kvalitetnim sastojcima da dublje prodru u kožu. Kao vodena faza koristi se demineralizirana voda, a uvijek se dodaju i umjetni mirisi i boje kako bi krema bila dopadljiva te neizostavni konzervansi kako bi krema imala iznimno dug rok trajanja te na policama trgovina ili u skladištima distributera stajala i po nekoliko godina. 
Prirodna kozmetika pomaže u njezi kože prije svega pomoću ljekovite snage kvalitetnih 
hladno prešanih biljnih i čistih esencijalnih ulja te prirodnih biljnih dodataka.
 Prirodna kozmetika, za razliku od klasične kozmetike, ne sadrži agresivne sintetičke 
 konzervanse, umjetne mirise, umjetne boje i emulgatore, silikon i parafin.
 Prednost prirodne kozmetike je i u individualnom pristupu jer uzima u obzir različite 
 potrebe i želje svake osobe,  stanje kože izvana i iznutra pa se prema tome mijenja i 
 prilagođava sastav tijekom procesa njege.</textarea>
	 
	 
	  </div>

	  
	    
		@stop
		