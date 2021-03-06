<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function getIndex()
    {
        # process variable data or params
        # talk to the model
        # receive from the model
        # complied or process data from the model if needed
        # pass the data to the correct view

        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
        //return view('pages.welcome');

    }

    public function getAbout()
    {

        $first = 'Pavlo';
        $last = 'Mikhailidi';

        $name = $first.' '.$last;
        $email = 'mikhailidi.p@gmail.com';
        $data = [
            'name' => $name,
            'email' => $email
        ];
        return view('pages.about')->with($data);
    }

    public function getContact()
    {
        return view('pages.contact');
    }


}
