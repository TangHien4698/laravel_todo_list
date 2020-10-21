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
        $list_category = Category::all()->toArray();
        return view("category.index", ["list_category" => $list_category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $status = self::ERROR;
        if ($category->save()) {
            $status = self::SUCCESS;
        }
        return redirect()->route('category', ['status' => $status]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $data = $request->all();
        $infor_category = Category::where('name', $data["name"])->first();
        return view("category.edit", ["infor_category" => $infor_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request)
    {
        $value = Category::where('id', $request["id"])
            ->update(['name' => $request["name"]]);
        if ($value) {
            return redirect()->route('category', ['status' => self::SUCCESS]);
        }
        return redirect()->route('category', ['status' => self::ERROR]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $request->all();
        $name_cat = $data["cat_name"];
        $status = self::FALSE;
        if (!empty($name_cat)) {
            if (Category::where('name', $name_cat)->delete()) {
                $status = self::TRUE;
            }
        }
        return $status;
    }
}
