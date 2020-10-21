<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
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
        $categorys =  Category::all();
        $users = User::all();
        $tasks_main = Task::with('user','category')->get();
        return view('task.index',["users"=>$users,"categorys"=>$categorys,"tasks"=>$tasks_main]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TaskRequest $request)
    {
        //
        $data = $request->all();
        $task = new Task;
        $task->name_task = $request->name_task;
        $task->user_id = $request->id_user;
        $task->	category_id = $request->id_category;
        $status = self::ERROR;
        if($task->save())
        {
            $status = self::SUCCESS;
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
        $categorys =  Category::all();
        $users = User::all('*');
        $data = $request->all();
        $infor_task =Task::with('user','category')->where('id',$data["id_task"])->get();
        return view("task.edit",["infor_task"=>$infor_task[0],"users"=>$users,"categorys"=>$categorys]);
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
            return redirect()->route('task',['status'=>self::SUCCESS]);
        }
        else
        {
            return redirect()->route('task',['status'=>self::ERROR]);
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
        //
        $data = $request->all();
        $task_id = $data["task_id"];
        $status =  self::FALSE;
        if (!empty($task_id))
        {
            if (Task::where('id',$task_id)->delete())
            {
                $status = self::TRUE;
            }
        }
        return $status;
    }
}
