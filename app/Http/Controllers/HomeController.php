<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Article;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            return view('user.home');
        }
    }

    public function index()
    {
        $data = product::all();
        $article = Article::all();

        return view('user.home', ['data' => $data],['article' => $article]);

    }
}