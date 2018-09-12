@extends('Centaur::layout')

@section('title', 'Dodaj Proizvod')

@section('content')
@if (Sentinel::check() && Sentinel::inRole('administrator'))
 <div class="row">
  
        </div>
		
		
  <div class="table" style="color: #4080bf;">
	  <title>Dodaj proizvod</title>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>

tinymce.init({selector:'textarea'});

</script>  
	  
	   <form enctype="multipart/form-data" action="{{route('add_product')}}" method="post" 
	     name="add_product" id="add_product">{{csrf_field()}}  
	  <table align="center" width="700"border="2" bgcolor="palegreen"  >
	  
	  <tr align="center">
	  <td colspan="7">
	  <h2>Dodaj novi proizvod</h2>
	  </td>
	  </tr>
	  
	  
	
	  
	  <td align="center"><b>Naziv proizvoda:</b></td>
	  <td><input type="text" name="naziv_proizvoda" style="font-size: 15px;
	  "size="60"></td>
	  </tr>
	  
	  <td align="center"><b>Kategorija proizvoda:</b></td>
	  <td>
	  <select name="kategorija_proizvoda" style="font-size:15px;">
	  <?php echo $categories_dropdown;?>
	 
	  </select>
	  </td>
	  </tr>
	  
	  <td align="center"><b>Cijena proizvoda:</b></td>
	  <td><input type="text" name="cijena_proizvoda" style="font-size: 15px;"/></td>
	  </tr>
	  
	  <td align="center"><b>Opis proizvoda:</b></td>
	  
	  <td><textarea name="opis_proizvoda" cols="30" rows="10"></textarea></td>
	  </tr>
	  
	  <td align="center" ><b>Sastav proizvoda:</b></td>
	  <td><input type="text" name="sastav_proizvoda" style="font-size: 15px;"
	  size="60" /></td>
	  </tr>
	 
	  <td align="center"><b>Slika proizvoda:</b></td>
	  <td><label class="btn btn-success btn-file">Odaberi<input type="file" name="slika_proizvoda"style="font-size:15px; display: none;"/></td>
        
    </label>
	  </tr>
	  
	  <td align="center"><b>Ključne riječi:</b></td>
	  <td><input type="text" name="product_keywords"style="font-size: 15px;"
	  size="60" required/></td>
	  </tr>
	  <tr align="center">
	  
	  <td colspan="8"><div class="form-actions" ><input type="submit" class="btn btn-success btn-file"name="add_product" value="Dodaj"
	  style="font-size:18px" /></td>
	  </tr>
	  
	 </div>
	  
	  @endif
	 
		
		@stop