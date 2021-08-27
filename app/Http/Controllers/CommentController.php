<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewUserhasRegisteredEvent;
use App\Notifications\CommentNotification;

class CommentController extends Controller
{

    function giveComment(Request $request)
    {
        $data = $request->validate([
            'comment' => ['required']
        ]);

        $comment = Comment::create([
            'comment' => $request->comment,
            'user_id'   => Auth::id()
        ]);

        // $admin = User::where('role', 'admin')->first();
        event(new NewUserhasRegisteredEvent($comment));
        return 'Comment Sent';
    }

    function getUnreadComment()
    {
       $un_read_comment = count(Auth::user()->unReadNotifications);
       return response($un_read_comment);
    }

    public function markAllCommentAsRead()
    {
        $un_read_comment = Auth::user()->unReadNotifications;
        foreach($un_read_comment as $notifications) {
            $notifications->markAsRead();
        }

        return 'All Comment Read';
        
    }
}
