<?php

namespace App\Controllers;

use App\Models\Story;

class StoryLikesController
{

    public function store()
    {
        // var_dump(auth()->id);
        // dd(request('id'));
        // dd(empty(auth()));
        if (empty(auth()))
            return redirect('login');
        $id = request('id');
        $res = Story::like($id);
        // dd($res);
        if ($res) {
            redirect('story?id=' . $id);
        }
    }

    public function destroy()
    {
        if (empty(auth()))
            return redirect('login');
        $id = request('id');
        $res = Story::dislike($id);
        if ($res) {
            redirect('story?id=' . $id);
        }
    }
}
