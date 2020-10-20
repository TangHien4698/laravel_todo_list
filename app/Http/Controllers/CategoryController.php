<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Model\Category;
use Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_category =    Category::select('*')->get()->toArray();
        return view("category.index",["list_category"=>$list_category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $request->validate([
            'name_cat' => 'bail|required|unique:categorys|max:255',
        ]);
        $category = new Category;
        $category->name_cat = $request->name_cat;
        if($category->save())
        {
            $status = "success";
        }
        else
        {
            $status = "error";
        }
        return redirect()->route('category',['status'=>$status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request)
    {
        //
        $data = $request->all();
        $request->validate([
            'name_cat' => 'bail|required|max:255',
        ]);
        $infor_category =Category::where('name_cat',$data["name_cat"])->first();
        return view("category.edit",["infor_category"=>$infor_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'name_cat' => 'bail|required|unique:categorys|max:255',
        ]);
        $value = Category::where('id_cat', $request["id"])
            ->update(['name_cat' => $request["name_cat"]]);
        if($value)
        {
            return redirect()->route('category',['status'=>"success"]);
        }
        else
        {
            return redirect()->route('category',['status'=>"error"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
//        dd(1);
        $data = $request->all();
        $name_cat = $data["cat_name"];
        $status = "";
        if (empty($name_cat))
        {
            $status = "false";
        }
        else
        {
            if (Category::where('name_cat',$name_cat)->delete())
            {
                dd(123456);
                $status = "true";
            }
            $status = "false";
        }
        return $status;
    }
}
