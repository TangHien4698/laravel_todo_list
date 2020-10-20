<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_user = User::select('*')->get()->toArray();
        return view('user.index',['listuser'=>$list_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|unique:users|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:8'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->email);
        if($user->save())
        {
            $status = "success";
        }
        else
        {
            $status = "error";
        }
        return redirect()->route('homeuser_router',['status'=>$status]);

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
            'name_edit' => 'bail|required|max:255',
        ]);
        $infor_user =User::where('name',$data["name_edit"])->first();
        return view("user.edit",["infor_user"=>$infor_user]);
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
        $request->validate([
            'name_edit' => 'bail|required|max:255',
            'email_edit' => 'required',
        ]);
        $value = User::where('id', $request["id"])
            ->update(['name' => $request["name_edit"],'email' => $request["email_edit"]]);
        if($value)
        {
            return redirect()->route('homeuser_router',['status'=>"success"]);
        }
        else
            {
                return redirect()->route('homeuser_router',['status'=>"error"]);
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
        $name_user = $data["user_name"];
        $status = "";
        if (empty($name_user))
        {
            $status = "false";
        }
        else
        {
            if (User::where('name',$name_user)->delete())
            {
                  dd(123);
                $status = "true";
            }
            $status = "false";
        }
        return $status;
    }
}
