<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Task;
use App\Model\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys =  Category::select('*')->get();
        $users = User::select('*')->get();
        $tasks = Task::select('*')->get();

        // use map
        $tasks_main = $tasks->map(function($parent) use($tasks){
            $parent->name_user = $parent->user->name;
            $parent->name_category = $parent->category->name_cat;
            return $parent;
        });
        return view('task.index',["users"=>$users,"categorys"=>$categorys,"tasks"=>$tasks_main]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = $request->all();
        // validate data
        $request->validate([
            'name_task' => 'bail|required|unique:tasks|max:255',
            'id_user' => 'exists:App\Model\User,id',
            'id_category' => 'exists:App\Model\Category,id_cat'
        ]);
        $task = new Task;
        $task->name_task = $request->name_task;
        $task->user_id = $request->id_user;
        $task->	category_id = $request->id_category;
        if($task->save())
        {
            $status = "success";
        }
        else
        {
            $status = "error";
        }
        return redirect()->route('task',['status'=>$status]);
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
        $categorys =  Category::select('*')->get();
        $users = User::select('*')->get();
        $data = $request->all();
        $infor_task =Task::where('id',$data["id_task"])->get();
        $tasks_main = $infor_task->map(function($parent) use($infor_task){
            $parent->name_user = $parent->user->name;
            $parent->name_category = $parent->category->name_cat;
            return $parent;
        });
        return view("task.edit",["infor_task"=>$tasks_main[0],"users"=>$users,"categorys"=>$categorys]);
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

        $value = Task::where('id', $request["id"])
            ->update(['name_task' => $request["name_task"],'user_id' => $request["id_user"],'category_id'=>$request["id_category"]]);
        if($value)
        {
            return redirect()->route('task',['status'=>"success"]);
        }
        else
        {
            return redirect()->route('task',['status'=>"error"]);
        }
        //
//        $request->validate([
//            'name_edit' => 'bail|required|max:255',
//            'email_edit' => 'required',
//        ]);
//        $value = User::where('id', $request["id"])
//            ->update(['name' => $request["name_edit"],'email' => $request["email_edit"]]);
//        if($value)
//        {
//            return redirect()->route('homeuser_router',['status'=>"success"]);
//        }
//        else
//        {
//            return redirect()->route('homeuser_router',['status'=>"error"]);
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $data = $request->all();
        $task_id = $data["task_id"];
        $status = "";
        if (empty($task_id))
        {
            $status = "false";
        }
        else
        {
            if (Task::where('id',$task_id)->delete())
            {
                $status = "true";
            }
            $status = "false";
        }
        return $status;
    }
}
