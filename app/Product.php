<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{
    protected $fillable =['naziv_proizvoda', 'kategorija_proizvoda','cijena_proizvoda','opis_proizvoda','slika_proizvoda','sastav_proizvoda','product_keywords'];
    
	public function Category(){

    return $this->belongsTo('Category');

}
	}

