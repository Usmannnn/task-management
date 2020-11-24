<?php

namespace App\Http\Controllers;

use App\Models\Subtask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Task::with('users')->get();

        return view('task.index')->with(['results' => $results]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereNotIn('name', ['admin'])->get();

        $tasks = Task::get();

        return view('task.create')->with(['users' => $users , 'tasks' => $tasks]);
    }

    public function createSub()
    {
        $users = User::whereNotIn('name', ['admin'])->get();

        $tasks = Task::get();

        return view('subtask.create')->with(['users' => $users , 'tasks' => $tasks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;

        $task['user_id'] = $request->person;
        $task['task_name'] = $request->taskName;
        $task['content'] = $request->taskContent;
        $task['start_date'] = $request->startDate;
        $task['end_date'] = $request->endDate;


        $task->save();

        //user_task modeli olmadığı için
        DB::insert('insert into user_task(user_id,task_id) values (?,?)', [$request->person, $task->id]);

        return back()->with(['message' => 'Task defined..']);

    }

    public function storeSub (Request $request) {

        Subtask::create([
            'user_id' => $request->person,
            'task_id' => $request->task_id,
            'content' => $request->subContent,
        ]);

        Task::where('id', $request->task_id)->increment('subCount');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Task::where('user_id', $id)
            ->orWhere('user_id', 0)
            ->get();

        return view('task.show')->with(['tasks' => $tasks]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getChangeStatus($id, $status)
    {
        Task::where('id', $id)->update(['status' => $status]);
        return back();
    }

    public function getChangeSubStatus($id, $task_id, $status)
    {
        Subtask::where('id', $id)->update(['status' => $status]);

        if ($status == 1) {
            Task::where('id', $task_id)->increment('progress');
        } else {
            Task::where('id', $task_id)->decrement('progress');
        }

        return back();
    }

    public function getSubTasks($id) {

        $subTasks = Subtask::with('tasks')
            ->where(['user_id' => $id])
            ->get();
        return view('task.show-subtask')->with(['subTasks' => $subTasks]);
    }
}
