<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Notification::with('users')->get();
        return view('notification.index')->with(['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereNotIn('name', ['admin'])->get();

        return view('notification.create')->with(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notify = new Notification;

        $notify['user_id'] = $request->person;
        $notify['name'] = $request->notificationName;
        $notify['content'] = $request->notificationContent;

//        Notification::create([
//            'user_id' => $request->person,
//            'name' => $request->notificationName,
//            'content' => $request->notificationContent
//        ]);

        $notify->save();

        DB::insert('insert into user_notify(user_id,notification_id) values (?,?)', [$request->person, $notify->id]);

        return back()->with(['message' => 'Notification generated..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notify = Notification::where('user_id',$id)
            ->orWhere('user_id', 0)
            ->get();

        return view('notification.show')->with(['notifies' => $notify]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function getChangeStatus($id, $status)
    {
        Notification::where('id', $id)->update(['status' => $status]);
        return back();
    }
}
