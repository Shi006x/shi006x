<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    } 

    public function getByLimit(int $limit_count = 10)
    {
    return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }

/**
 * 特定IDのpostを表示する
 *
 * @params Object Post // 引数の$postはid=1のPostインスタンス
 * @return Reposnse post view
 */
    public function show(Post $post)
    {
    return view('posts.show')->with(['post' => $post]);
    }
}
?>