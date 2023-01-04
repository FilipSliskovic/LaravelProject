<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class AdminCategoryController extends BackEndController
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->data['categories'] = Category::with('image')->with('parent')->get();
//        dd($this->data);

        return view('pages.admin.categories',["data" => $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->data['categories'] = Category::all();



        return view('pages.admin.createnewcategory',["data" => $this->data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {


        try {



            $imgId = $this->UploadImage($request->image);

            $category = new Category();

            $category->name = $request->name;
            $category->description = $request->description;
            $category->image_id = $imgId;

            if ($request->ParentCategory > 0)
            {
                $category->Parent_id = $request->ParentCategory;

            }

            $category->save();
            $this->AddToLog('Create a new category');


        }

        catch (\Exception $e) {
            $userTicket = uuid_create();
            Log::error($userTicket . " " . $e->getMessage());
            return  redirect()->back()->with("error-msg", "An error has occurred, please contact support with this ticket number " . $userTicket);
        }

        return back('201')->with('success-msg', "Thank you for contacting us!");



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['singleCat'] = Category::find($id);
        $data['allCat'] = Category::all();
//        $data['singleCat'] = Category::with(Category::class)->find($id);

        if($data['singleCat'])
        {
            return view('pages.admin.ShowSingle',['data' => $data['singleCat'],'categories' => $data['allCat']]);
        }
        return abort(404);
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
    public function update(UpdateCategoryRequest $request)
    {
        try {
            $cat = Category::find($request->id);

            if ($cat)
            {
                if ($cat->name != $request->name)
                {

                    $cat->name = $request->name;
                }
                if ($cat->description != $request->description)
                {

                    $cat->description = $request->description;
                }
                if ($cat->parent_id != $request->parent_id)
                {
                    $cat->parent_id = $request->parent_id;
                }
                $cat->save();
            }
            else
            {
                return abort('404');
            }

        }
        catch (\Exception $e) {
            $userTicket = uuid_create();
            Log::error($userTicket . " " . $e->getMessage());
            return  redirect()->back()->with("error-msg", "An error has occurred, please contact support with this ticket number " . $userTicket);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $products = Product::where('category_id',$id)->count();
            $cat = Category::with('product')->with('child')->find($id);

            if ($products == 0)
            {
                if ($cat->child == null)
                {
                    Category::destroy($id);
                    $this->AddToLog('Delete a category');
                }
                else{
                    return redirect()->back()->with('error-msg','category has children and cannot be deleted!');
                }

            }
            else
            {
                return redirect()->back()->with('error-msg','category has products and cannot be deleted!');
            }

        }
        catch (\Exception $e) {
            $userTicket = uuid_create();
            Log::error($userTicket . " " . $e->getMessage());
            return  redirect()->back()->with("error-msg", "An error has occurred, please contact support with this ticket number " . $userTicket);
        }

    }








}
