<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends BackEndController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
//        dd($this->data);

        $this->data['proizvodi'] = Product::with('category')->with('image')->get();

        return view('Pages.Admin.Products',['data'=>$this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd($this->data);
        $this->data['categories'] = Category::where('parent_id','!=',null)->get();
//        dd($this->data);
        return view('Pages.Admin.AdminCreateNewProduct',['data'=>$this->data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
//        dd('tu');
            $product = new Product();

        try {

            $product->Name = $request->name;
            $product->Description = $request->description;
            $product->Price = $request->Price;
            $product->Amount = $request->Amount;
            $product->category_id = $request->Category;

//            dd($product);

            $image = $this->UploadImage($request->image);
            $product->save();
            $productImage = new ProductImage();

            $productImage->image_id = $image;
            $productImage->product_id = $product->id;


            $productImage->save();
            $this->AddToLog('Created a new product');

        }
        catch (\Exception $e) {
            $userTicket = uuid_create();
            Log::error($userTicket . " " . $e->getMessage());
            return  redirect()->back()->with("error-msg", "An error has occurred, please contact support with this ticket number " . $userTicket);
        }

        return back()->with('success-msg', "Successfully added a new product");


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::find($id);
        if ($prod != null)
        {
            $prod->delete();
            $this->AddToLog('Removed a product');
        }
        else
        {
            abort('404');
        }
    }
}
