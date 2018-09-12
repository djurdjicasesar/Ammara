@extends('Centaur::layout')

@section('title', 'Kategorije')

@section('content')

<div class="table" style="color: #4080bf;">
	  <title>Dodaj kategoriju</title>
	   <table align="center" width="700"border="2">
	  
	  <tr align="center">
	  <td colspan="7">
	  <h2>Dodaj novu kategoriju</h2>
	  </td>
	  </tr>
     
	  
<tr align="center"><form class="form-horizontal" action="{{route('add_category')}}" method="post" 
	     name="add_category" id="add_category"></tr>{{csrf_field()}}  
      <tr>
	  <td align="center"><b>Naziv kategorije:</b></td>
	  <td><input type="text" name="naziv_kategorije" id="naziv_kategorije" style="font-size: 15px;
	  "size="60"></td></tr>
	  <tr>
	  <td align="center"><b>Slug:</b></td>
	  <td><input type="text" name="slug" id="slug" style="font-size: 15px;
	  "size="60"></td></tr>
	
	<td align="center"colspan="7"><div class="form-actions" >
	<input type="submit" value="Dodaj" class="btn btn-success" ></td>
	
	</form></tr> 
	
	

</table>

@stop