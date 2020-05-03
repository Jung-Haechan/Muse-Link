<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index($board)
    {
        if ($board === 'create') {
            return $this->create();
        } elseif ($board === 'edit') {
            $this->edit();
        } else {
            return view('music.'.$board.'.index');
        }
    }

    public function show()
    {

    }

    public function create()
    {
        return view('music.create');
    }

    public function store()
    {

    }

    public function edit()
    {

    }
    public function update()
    {

    }

    public function destroy()
    {

    }
}
