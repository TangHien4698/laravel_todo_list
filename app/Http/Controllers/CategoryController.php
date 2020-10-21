<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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
        $list_category =    Category::all()->toArray();
        return view("category.index",["list_category"=>$list_category]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( CategoryRequest $request)
    {
        $category = new Category;
        $category->name_cat = $request->name_cat;
        $status = self::ERROR;
        if($category->save())
        {
            $status = self::SUCCESS;
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
        $infor_category =Category::where('name_cat',$data["name_cat_edit"])->first();
        return view("category.edit",["infor_category"=>$infor_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request)
    {
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
        $data = $request->all();
        $name_cat = $data["cat_name"];
        $status = self::FALSE;
        if (!empty($name_cat)) {
            if (Category::where('name_cat',$name_cat)->delete()) {
                $status = self::TRUE;
            }
        }
        return $status;
    }
}
