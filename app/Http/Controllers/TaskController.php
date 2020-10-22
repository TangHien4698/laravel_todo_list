<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Model\Category;
use App\Model\Task;
use App\Model\User;
use Illuminate\Http\Request;
use Response;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();
        $users = User::all();
        $tasks_main = Task::with('user', 'category')->get();
        return view('task.index', ["users" => $users, "categorys" => $categorys, "tasks" => $tasks_main]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TaskRequest $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        //
        $task = new Task;
        $task->name = $request->name;
        $task->user_id = $request->user_id;
        $task->category_id = $request->category_id;
        $status = self::ERROR;
        if ($task->save()) {
            $status = self::SUCCESS;
        }
        return redirect()->route('task', ['status' => $status]);
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
        $categories = Category::all();
        $users = User::all('*');
        $data = $request->all();
        $task = Task::with('user', 'category')->where('id', $data["id"])->get();
        return view("task.edit", ["task" => $task[0], "users" => $users, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $value = Task::where('id', $request["id"])
            ->update(['name' => $request["name"], 'user_id' => $request["user_id"], 'category_id' => $request["category_id"]]);
        if ($value) {
            return redirect()->route('task', ['status' => self::SUCCESS]);
        }

        return redirect()->route('task', ['status' => self::ERROR]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $data = $request->all();
        $task_id = $data["task_id"];
        $status = self::FALSE;
        $message = "Delete task fail";
        if (!empty($task_id)) {
            if (Task::where('id', $task_id)->delete()) {
                $status = self::TRUE;
                $message = "Delete task success";
            }
        }
        return Response::json(['status' => $status, 'message' => $message]);
    }
}
