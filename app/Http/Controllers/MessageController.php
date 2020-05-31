<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $opponents = User::listOpponents()->paginate(12);
        return view('user.message.index', [
            'opponents' => $opponents,
        ]);
    }

    public function show(User $user) {
        $messages = $user->messagesWith()->limit(100)->get();
        foreach ($messages as $message) {
            $message['created_at_for_js'] = getTime($message->created_at);
        }
        return view('user.message.show', [
            'opponent' => $user,
            'messages' => $messages,
        ]);
    }

    public function store() {
        $data = request()->validate([
            'content' => 'required',
            'receiver_id' => 'required'
        ]);
        $data['sender_id'] = Auth::id();

        $message = Message::create($data);
        $message['created_at_for_js'] = getTime($message->created_at);

        return response()->json([
            'message' => $message,
        ]);
    }

    public function delete_opponent(User $user) {
        Message::where([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
        ])->update([
            'is_deleted_by_sender' => 1,
        ]);
        Message::where([
            'receiver_id' => Auth::id(),
            'sender_id' => $user->id,
        ])->update([
            'is_deleted_by_receiver' => 1,
        ]);
        return redirect()->route('user.message.index')
            ->with('alert', '대화 상대가 삭제되었습니다.');
    }
}
