<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to Felis Catus website";
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = "About Page";
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services Page',
            'services' => ['Web Design', 'Programming', 'Laravel']
        );
        return view('pages.services')->with($data);
    }
}
