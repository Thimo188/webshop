<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Request;

Use App\Product;
Use Charts;
Use DB;
Use App\User;
Use Auth;

class AdminController extends Controller
{
    public function index() {

      return view('/admin');



    }
    public function adminProducts() {
      //$products = Product::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();

      $productsArray = Product::orderBy('product_name')
      ->pluck('product_name')
      ->toArray();


      // $chart = Charts::create('bar', 'highcharts')
      //     ->title("Product Details")
      //     ->elementLabel("Total Products")
      //     ->dimensions(1000, 500)
      //     ->responsive(true);
      //     //->groupByMonth(date('Y'), true);
  $Soldquantity = DB::table('order_details')
  ->join('products', 'order_details.product_id', '=', 'products.id')
  ->select('order_details.product_id', DB::raw('SUM(order_details.amount)as total'))
  ->groupBy('order_details.product_id')
  ->orderBy('order_details.created_at', 'asc')
  ->take(5)
  ->pluck('total')->toArray();

  $Soldproducts = DB::table('order_details')
  ->join('products', 'order_details.product_id', '=', 'products.id')
  ->select('order_details.product_id', DB::raw('SUM(order_details.amount)as total'))
  ->groupBy('order_details.product_id')
  ->orderBy('total','asc')
  ->take(5)
  ->pluck('total')->toArray();

  $SoldName = DB::table('order_details')
  ->join('products', 'order_details.product_id', '=' , 'products.id')
  ->select('order_details.product_id','products.product_name', DB::raw('SUM(order_details.amount)as total'))
  ->groupBy('order_details.product_id', 'products.product_name')
  ->orderBy('total', 'asc')
  ->take(5)
  ->pluck('products.product_name')->toArray();


  $Month = DB::table('order_details')
    ->select('order_details.product_id', 'order_details.created_at', DB::raw('SUM(order_details.amount)as total'))
    ->groupBy('order_details.product_id', 'order_details.created_at')
    ->orderBy('order_details.created_at', 'asc')
    ->pluck('order_details.created_at')->toArray();

  $Price = DB::table('order_details')
  ->select('order_details.product_id', 'order_details.product_price', DB::raw('SUM(order_details.product_price)as price'))
  ->groupBy('order_details.product_id', 'order_details.product_price')
  ->orderBy('price', 'asc')
  ->pluck('order_details.product_price')->toArray();



// hoeveel opbrengst
  $line_chart = Charts::create('line', 'highcharts')
    ->title('Turnover')
    ->elementLabel('turnover')
    ->labels($Month)
    ->values($Price)
    ->dimensions(1500,500)
    ->responsive(true);


// chart voor hoeveel producten per maand
  $chart = Charts::database(User::all(),'bar', 'highcharts')
    ->title('Products sold')
    ->elementLabel('Products')
    ->labels($Month)
    ->values($Soldquantity)
    ->dimensions(1500,500)
    ->responsive(true);
    // ->groupByMonth('2018',true);

// chart voor welke producten het meest verkocht zijn
  $pie_chart = Charts::create('pie', 'highcharts')
      ->title('Popular product sales')
      ->elementLabel('Products')
      ->labels($SoldName)
      ->values($Soldproducts)
      ->dimensions(1500,500)
      ->responsive(true);

  // $chart = Charts::create('bar', 'highcharts')->dateColumn('created_at')
  //     ->title('Products sold')
  //     ->elementLabel('Products')
  //     ->labels($SoldName)
  //     ->values($Soldproducts)
  //     ->dimensions(1500,500)
  //     ->responsive(true)
  //     ->groupByMonth();


  // $chart = Charts::database(User::all(), 'bar', 'highcharts')->data(Role::all())
  //   ->title('names')
  //   ->elementLabel('Total')
  //   ->dimensions(1000,500)
  //   ->responsive(false)
  //   ->groupBy('name');

  // $pie_chart = Charts::create('pie', 'highcharts')
  //     ->title('Products sold')
  //     ->labels($SoldName)
  //     ->values($Soldproducts)
  //     ->dimensions(1500,500)
  //     ->responsive(true);




  // $line_chart = Charts::create('line', 'highcharts')
  //       ->title('Line Chart Demo')
  //       ->elementLabel('Chart Labels')
  //       ->labels(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'])
  //       ->values([15,25,50, 5,10,20])
  //       ->dimensions(1000,500)
  //       ->responsive(true);

  $areaspline_chart = Charts::multi('areaspline', 'highcharts')
          ->title('Areaspline Chart Demo')
          ->colors(['#ff0000', '#ffffff'])
          ->labels(['Jan', 'Feb', 'Mar', 'Apl', 'May','Jun'])
          ->dataset('Product 1', [10, 15, 20, 25, 30, 35])
          ->dataset('Product 2',  [14, 19, 26, 32, 40, 50]);


  $percentage_chart = Charts::create('percentage', 'justgage')
          ->title('Percentage Chart Demo')
          ->elementLabel('Chart Labels')
          ->values([65,0,100])
          ->responsive(true)
          ->height(300)
          ->width(0);

  $geo_chart = Charts::create('geo', 'highcharts')
          ->title('GEO Chart Demo')
          ->elementLabel('Chart Labels')
          ->labels(['US', 'UK', 'IND'])
          ->colors(['#C5CAE9', '#283593'])
          ->values([25,55,70,90])
          ->dimensions(1000,500)
          ->responsive(true);

  $area_chart = Charts::create('area', 'highcharts')
        ->title('Area Chart')
        ->elementLabel('Chart Labels')
        ->labels(['First', 'Second', 'Third'])
        ->values([28,52,64,86,99])
        ->dimensions(1000,500)
        ->responsive(true);

  $donut_chart = Charts::create('donut', 'highcharts')
        ->title('Donut Chart')
        ->labels(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'])
        ->values([25,50,70,860])
        ->dimensions(1000,500)
        ->responsive(true);

      return view('/adminproducts',compact('chart' , 'pie_chart', 'line_chart', 'areaspline_chart', 'percentage_chart', 'geo_chart', 'area_chart', 'donut_chart'));
    }
}
