<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
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
        $list_user = User::all()->toArray();
        return view('user.index', ['listuser' => $list_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRequest $request)
    {
//        $request->validate([
//            'name' => 'bail|required|unique:users|max:255',
//            'email' => 'required|unique:users',
//            'password' => 'required|string|min:8'
//        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->email);
        $status =  self::ERROR;
        if ($user->save()) {
            $status = self::SUCCESS;
        }
        return redirect()->route('homeuser_router', ['status' => $status]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
//        $request->validate([
//            'name_edit' => 'bail|required|max:255',
//        ]);
        $infor_user = User::where('name', $data["name_edit"])->first();
        return view("user.edit", ["infor_user" => $infor_user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request)
    {
//        $request->validate([
//            'name_edit' => 'bail|required|max:255',
//            'email_edit' => 'required',
//        ]);

        $value = User::where('id', $request["id"])
            ->update(['name' => $request["name"], 'email' => $request["email"]]);
        if ($value) {
            return redirect()->route('homeuser_router', ['status' => self::SUCCESS]);
        } else {
            return redirect()->route('homeuser_router', ['status' => self::ERROR]);
        }
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
        $name_user = $data["user_name"];
        $status = self::FALSE;
        if (!empty($name_user)) {
            if (User::where('name', $name_user)->delete()) {
                $status = self::TRUE;
            }
        }
        return $status;
    }
}
