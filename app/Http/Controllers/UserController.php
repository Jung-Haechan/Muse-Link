<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use App\Models\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Array_;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }
    /**
     * Display a listing of the resource.
     *
     * @param $board
     * @return void
     */
    public function index($board)
    {
        $users = User::listAll($board)->paginate(20);
        foreach($users as $user) {
            foreach(config('translate.role') as $role_eng => $role_korean) {
                $user[$role_eng.'_num'] = Collaborator::where('user_id', $user->id)->where('role', $role_eng)->count();
            }
            $user['my_projects_num'] = Project::where('user_id', $user->id)->count();
        }
        return view('user.'.$board.'.index', [
            'users' => $users,
            'board' => $board,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($board, User $user)
    {
        if(!$user['is_'.$board]) {
            return redirect()->back()
                ->with('alert', '채널이 존재하지 않습니다.');
        }
        $already_followed = Auth::check() ?
            Auth::user()->follows()->where('followee_id', $user->id)->first() :
            NULL;

        return view('user.'.$board.'.show.app', [
            'user' => $user,
            'board' => $board,
            'exhibits' => $user->exhibits()->listAll($board)->get(),
            'face_exhibit' => $user[$board.'_exhibit'],
            'already_followed' => $already_followed != NULL,
            'opened_projects' => $user->projects,
            'collaborations' => $user->collaborators()->listJoined($board)->get(),
            'followers' => $user->followers()->latest()->paginate(5),
            'followers_number' => $user->followers()->count(),
            'follows' => $user->follows,
        ]);
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
    public function update_face(Request $request, User $user, $board)
    {
        if(!isUserAdmin(Auth::user(), $user)) {
            return redirect()->back()
                ->with('alert', '권한이 없습니다.');
        }
        $user->update([
            $board.'_exhibit_id' => $request->exhibit_id
        ]);
        return redirect()->back()
            ->with('alert', '해당 작품이 대표로 설정되었습니다.');
    }

    public function search(Request $request, $board) {
        $users = User::listAll($board)
            ->where(function ($query) use($request) {
                $query->where('name', 'like', '%'.$request->word.'%');
            })->paginate(12);
        return view('user.' . $board . '.index', [
            'users' => $users,
            'board' => $board,
        ]);
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
}
