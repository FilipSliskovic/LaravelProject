<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Faker;
use Illuminate\Support\Facades\DB;

class MenuController extends FrontEndController
{
    //
    public function index(){

//        $faker = Faker\Factory::create();
//
//
//        for($i=0;$i < 6;$i++)
//        {
//            $obj = new \stdClass();
//            $obj->title = $faker->unique()->word;
//            $obj->price = rand(10,100);
//            $obj->description = $faker->text(40);
//            $obj->image = 'menu-1.jpg';
//            $obj->alt = $faker->unique()->word;
//
//            $this->data["products"][] = $obj;
//        }
       // $proizvodi = Product::with('image')->get();
       // $proizvodi = DB::table('Products')->join('images','products.id','=','images.product_id')->get();
       // dd($proizvodi);

        $this->data['proizvodi'] = Product::with('category')->with('image')->get();
        $this->data['categories'] = Category::where('parent_id','!=',null)->get();


        return view('pages.main.menu',["data" => $this->data]);
    }


}
