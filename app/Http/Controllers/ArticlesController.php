<?php

namespace App\Http\Controllers;

use App\Models\Articles;

class ArticlesController extends Controller
{

    public function index()
    {
        $title = 'Task-Zone ~ Homepage';
        $data = Articles::orderBy('id', 'desc')->paginate(9);
        return view('Homepage.homepage', [
            'title'     => $title,
            'article'   => $data,
            'meta'      => [
                'currentPage'   => $data->currentPage(),
                'nextPage'      => $data->nextPageUrl(),
                'prevPage'      => $data->previousPageUrl(),
            ]
        ]);
    }

    public function show(Articles $articles, $slug)
    {
        $title = 'Task-Zone ~ Article';
        $data  = $articles->firstWhere('slug', $slug);
        if (!isset($data)) return view('Error.error', ['data' => $slug]);
        return view('Article.article', [
            'title' => $title,
            'data'  => $data,
        ]);
    }

    public function listTags()
    {
        $title          = 'Task-Zone ~ Daftar Tag';
        $data           = Articles::all()->unique('tag')->sortDesc();
        $totalArticle   = Articles::all()->countBy('tag');
        return view('Homepage.listTags', [
            'title'             => $title,
            'data'              => $data,
            'sumArticle'        => $totalArticle,
            'increment'         => 1,
        ]);
    }

    public function detailTag(Articles $articles, $tag)
    {
        $title           = "Task-Zone ~ $tag";
        $data            = $articles->where('tag', $tag)->get();
        if ($data->isEmpty()) return view('Error.error', ['data' => $tag]);
        return view('Homepage.detailTag', [
            'title'     => $title,
            'data'      => $data,
            'titleTag'  => $tag,
        ]);
    }
}
