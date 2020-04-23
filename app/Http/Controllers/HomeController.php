<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
{
    public function store(Request $request){


        Post::create($this->getValidate($request));
    }

    public function update(Post $post, Request $request){

        $post->update($this->getValidate($request));
    }




    /**
     * @param Request $request
     * @return array
     */
    public function getValidate(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'userid' => 'required'
        ]);
    }
}

