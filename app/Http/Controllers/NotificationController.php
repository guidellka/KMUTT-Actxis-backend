<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notification = Notification::all();
        $data['notification'] = $notification;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $notification = new Notification();
        $notification->user_id = $request['user_id'];
        $notification->title = $request['title'];
        $notification->text = $request['text'];
        $notification->link = $request['link'];
        $notification->is_read = $request['is_read'];
        $notification->save();
        return $notification;
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        return $notification;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::find($id);
        $notification->user_id = $request['user_id'];
        $notification->title = $request['title'];
        $notification->text = $request['text'];
        $notification->link = $request['link'];
        $notification->is_read = $request['is_read'];
        $notification->save();
        return $notification;
    }

    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        return $notification;
    }
}