<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Description;
use App\Products;
use App\Color;
use App\Product;
class DescriptionController extends Controller
{
  public function index() {
		return view('description');
	}
    public function searchTag($id) {
        $colors = Color::all();
        $productsview=Product::with('ProductSizing', 'ProductTag','ProductImages')
            ->join('product_categories', 'products.id', '=' , 'product_categories.product_id')
            ->join('categories', 'categories.id' , '=' , 'product_categories.category_id')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->join('product_tags', 'products.id', '=', 'product_tags.product_id')
            ->join('product_colors', 'products.id', '=', 'product_colors.product_id')
            ->join('colors', 'colors.id', '=', 'product_colors.color_id')
            ->where('product_tags.id', $id)
            ->paginate(15)->onEachSide(3);;
        return view('photography', compact('productsview', 'colors'));
    }
}
