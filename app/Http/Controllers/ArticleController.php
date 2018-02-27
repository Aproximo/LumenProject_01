<?php
/**
 * Created by PhpStorm.
 * User: or_os
 * Date: 16.02.2018
 * Time: 15:55
 */

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['read']]);
    }

    public function read($id){
        $article = Article::findorfail($id);

        return response()->json($article);
    }

    public function list(){
        $article = Article::all();

        return response()->json($article);
    }

    public function create(Request $request){

      $article = new Article;
      $article->title = $request->title;
      $article->content =$request->content;

      try {
          $article->save();
      } catch (\Exception $e){
          return response()->json(['created' => false, 'error' => $e->getMessage()]);
      }
      return response()->json(['created' => true]);

    }

    public function update($id, Request $request){
        $article = Article::findorfail($id);
        $article->title = $request->title;
        $article->content =$request->content;

        try {
            $article->save();
        } catch (\Exception $e){
            return response()->json(['updated' => false, 'error' => $e->getMessage()]);
        }
        return response()->json(['updated' => true]);
    }

    public function delete ($id)
    {

        try {
            Article::findorfail($id)->delete();
        } catch (\Exception $e){
            return response()->json(['deleted' => false, 'error' => $e->getMessage()]);
        }
        return response()->json(['deleted' => true]);

    }
}