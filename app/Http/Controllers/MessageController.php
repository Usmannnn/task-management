<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereNotIn('id', [Auth::user()->id,0])->get();

        return view('message.create')->with(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Message::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->reciver_id,
            'm_head' => $request->m_head,
            'message' => $request->messageContent
        ]);

        return back()->with(['message' => 'Message is sended..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//        $messages = Message::where(['sender_id' => $id])->orWhere(['receiver_id' => $id])->get();

        $messages = Message::with('users')
            ->where(['sender_id' => $id])
            ->orWhere(['receiver_id' => $id])
            ->get();

        return view('message.show')->with(['messages' => $messages]);
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
        //
    }

    public function getChangeStatus($id, $status)
    {
        Message::where('id', $id)->update(['isRead' => $status]);
        return back();
    }
}
