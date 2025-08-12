<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(Request $request)
    {

        $name = 'mohamed';

        return view('front.main', compact('name'));
    }

    public function about(Request $request)
    {


        return view('front.about');
    }

    public function post(Request $request)
    {


        return view('front.post');
    }

    public function contact(Request $request)
    {


        return view('front.contact');
    }

    public function postContact(Request $request)
    {

    }
}
