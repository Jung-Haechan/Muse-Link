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
        //
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
        $already_followed = Auth::check() ?
            Auth::user()->follows()->where('followee_id', $user->id)->first() :
            NULL;

        return view('user.'.$board.'.show.app', [
            'user' => $user,
            'board' => $board,
            'exhibits' => $user->exhibits()->where('board', $board)->get(),
            'face_exhibit' => $user->face_exhibit()->where('board', $board)->first(),
            'already_followed' => $already_followed,
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
}
