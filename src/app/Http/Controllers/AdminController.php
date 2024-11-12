<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function adminPageShow()
    {
        $users = User::where("is_admin", false)->get()->all();
        $comments = Comment::all();

        return view("admin-page", compact("users", "comments"));
    }

    public function deleteUser(Request $request)
    {
        $user_id = $request->input("delete-user");
        $user = User::find($user_id);
        $user->delete();

        return redirect(route("admin.page"));
    }

    public function deleteComment(Request $request)
    {
        $comment_id = $request->input("delete-comment");
        $comment = Comment::find($comment_id);
        $comment->delete();

        return redirect(route("admin.page"));
    }

    public function sendEmail(Request $request)
    {
        $to = $request->input("to");
        $body = $request->input("body");
        $subject = $request->input("subject");

        Mail::raw($body, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });

        return redirect(route("admin.page"));
    }
}
