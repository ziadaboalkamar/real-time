<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index(){
      $posts =Post::with(['comments' => function($q){
          $q->select('id','post_id','comment');
      }])->get();
       return view('dashboard',compact('posts'));

   }
   public function saveComment(Request $request){
Comment::create([
   'user_id'=> Auth::id(),
   'post_id'=> $request->post_id,
   'comment' => $request->post_content,
]);
$data = [
    'user_id'=> Auth::id(),
    'post_id'=> $request->post_id,
    'comment' => $request->post_content,
    'date' => date('Y M d' ,strtotime(Carbon::now())),
    'time' => date('h:i A' ,strtotime(Carbon::now()))
];
Notification::create([
    'user_id'=> Auth::id(),
    'post_id'=> $request->post_id,
    'comment' => $request->post_content,
    'date' => date('Y M d' ,strtotime(Carbon::now())),
    'time' => date('h:i A' ,strtotime(Carbon::now()))
]);


 event(new NewNotification($data));

return redirect()->back()->with(['success' => 'تم اضتفة التعليق بنجاح']);
   }
   public function notification(){
       $notification = Notification::select('comment','user_id','post_id','time','date')->where('user_id','=',Auth::id());
  return view('layouts.navigation',compact('notification'));
   }
}
