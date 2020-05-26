<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zakat;
use JWTAuth;

class ArticleController extends Controller
{
   public function index(){
    $user = JWTAuth::parseToken()->authenticate();
    $id = $user->id;
    $email = $user->email;
    $artikel = Zakat::all();
    $showPost = array();
    foreach ($artikel as $post) {
        $postId = $post->id_post;
        if ($postId === $id) {
            array_push($showPost,$post);
        }
    }
    return response()->json($showPost, 200);
   }
}
