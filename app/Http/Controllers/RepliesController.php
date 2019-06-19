<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $replies = Reply::paginate();
        return view('replies.index', compact('replies'));
    }

    public function show(Reply $reply)
    {
        return view('replies.show', compact('reply'));
    }

    public function create(Reply $reply)
    {
        return view('replies.create_and_edit', compact('reply'));
    }

    public function store(ReplyRequest $request, Topic $topic)
    {
        $request->offsetSet('topic_id', $topic->id);

        $reply = Auth::user()->replies()->create($request->all());

        return redirect()->to($topic->link())->with('success', '评论成功！');
    }

    public function edit(Reply $reply)
    {
        $this->authorize('update', $reply);
        return view('replies.create_and_edit', compact('reply'));
    }

    public function update(ReplyRequest $request, Reply $reply)
    {
        $this->authorize('update', $reply);
        $reply->update($request->all());

        return redirect()->route('replies.show', $reply->id)->with('message', 'Updated successfully.');
    }

    public function destroy(Topic $topic, Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();

        return back()->with('success', '删除成功！');
    }
}
