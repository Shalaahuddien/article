<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\StoreArticlesRequest;
use App\Http\Requests\UpdateArticlesRequest;
use App\Models\Articles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        if (Session::has('token')) {
            $user = User::firstWhere('token', Session::get('token'));
            $articles  = Articles::orderBy('id', 'desc')->paginate(6);
            $title = 'Task-Zone ~ Dashboard';
            return view('Users.dashboard', [
                'title' => $title,
                'user'  => $user,
                'data'  => $articles,
                'meta'  => [
                    'currentPage'  => $articles->currentPage(),
                    'nextPage'     => $articles->nextPageUrl(),
                    'prevPage'     => $articles->previousPageUrl(),
                ]
            ]);
        }
        return redirect()->back();
    }

    public function login_form()
    {
        if (!Session::has('token')) {
            $title = 'Task-Zone ~ Login';
            return view('Users.login', [
                'title'    => $title,
            ]);
        }
        return redirect()->back();
    }

    public function login(Request $request)
    {
        $user = User::firstWhere('username', $request->username);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak dapat ditemukan.');
        }
        $userPassword = $user->password;
        $checkPassword = Hash::check($request->password, $userPassword);
        if ($checkPassword) {
            $user->token = Str::random(20);
            $user->save();
            $request->session()->put('token', $user->token);
            return to_route('dashboard');
        }
        return redirect()->back()->with('error', 'Maaf,data anda tidak dapat ditemukan.');
    }

    public function register()
    {
        if (!Session::has('token')) {
            $title = 'Task-Zone ~ Register';
            return view('Users.register', [
                'title'    => $title,
            ]);
        }
        return redirect()->back();
    }

    public function create(CreateUsersRequest $request)
    {
        $request->validated();
        User::create([
            'email'     => $request->email,
            'username'  => $request->username,
            'password'  => bcrypt($request->password)
        ]);

        return to_route('login.form')->with('status', 'Account Created');
    }

    public function logout(Request $request)
    {
        User::where('token', $request->token)->update([
            'token' => NULL
        ]);
        Session::pull('token');
        return to_route('login.form');
    }

    public function create_article(StoreArticlesRequest $request)
    {

        $request->validated();
        Articles::create([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title, '-'),
            'description'   => Str::limit($request->contain, 150),
            'contain'       => $request->contain,
            'tag'           => Str::lower($request->tag)
        ]);
        return to_route('dashboard')->with('status', 'Article Added');
    }

    public function delete_article(Articles $articles, $id)
    {
        $article = $articles->find($id);
        $article->delete();
        return to_route('dashboard')->with('status', 'Article Deleted');
    }

    public function edit_article(Articles $articles, $slug)
    {
        $title = 'Task-Zone ~ Edit Article';
        $article = $articles->firstWhere('slug', $slug);
        if (!isset($article)) return view('Error.error', ['data' => $slug]);
        return view('Article.edit-article', [
            'title' => $title,
            'data'  => $article,
        ]);
    }

    public function update_article(UpdateArticlesRequest $request, $id)
    {
        $request->validated();
        Articles::where('id', $id)->update([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title, '-'),
            'description'   => Str::limit($request->contain, 150),
            'contain'       => $request->contain,
            'tag'           => Str::lower($request->tag),
        ]);
        return to_route('dashboard')->with('status', 'Article Edited');
    }
}
