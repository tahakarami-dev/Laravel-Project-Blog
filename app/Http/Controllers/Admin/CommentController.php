<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommentStatus;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comments()
    {
        $comments = Comment::query()->
        orderByRaw('FIELD(status,
        "'.CommentStatus::Draft->value .'",
        "'.CommentStatus::Accepted->value .'",
        "'.CommentStatus::Rejected->value .'" )'
        )->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    public function submitUserComment(Request $request): \Illuminate\Http\JsonResponse
    {
        $content = $request->get('content');
        Comment::query()->create([
            'content' => $content,
            'user_id'=> auth()->user()->id,
            'article_id' => $request->get('article_id'),
        ]);
        return response()->json(['success'=> "نظر شما بعد از تایید مدیر نمایش داده خواهد شد"]);
    }

    public function acceptComments(Comment $comment): \Illuminate\Http\RedirectResponse
    {
        $comment->update([
            'status' => CommentStatus::Accepted->value
        ]);
        return redirect()->back();
    }

    public function rejectComments(Comment $comment): \Illuminate\Http\RedirectResponse
    {
        $comment->update([
            'status' => CommentStatus::Rejected->value
        ]);
        return redirect()->back();
    }
}
