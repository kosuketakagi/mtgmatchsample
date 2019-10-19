<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recruit;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $posts = Recruit::paginate(2);

        return view('recruit.index', array('posts' => $posts));
    }


    public function mypage(Request $request)
    {
        $posts = Recruit::paginate(2);

        return view('recruit.index', array('posts' => $posts));
    }


    public function detail(Request $request)
    {
        $posts = Recruit::find($request->id);

        return view('recruit.detail', ['posts' => $posts]);

    }


}


