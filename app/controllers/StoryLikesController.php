<?php

namespace App\Controllers;

class StoryLikesController
{

    public function store()
    {
        var_dump(auth()->id);
        dd(request());
    }

    public function destroy()
    {
        dd(request());
    }
}
