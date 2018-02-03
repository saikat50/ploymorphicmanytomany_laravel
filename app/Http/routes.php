<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;
use App\Tag;
use App\Video;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function (){

   $post = Post::create(['name'=>'My first post']);

   $tag = Tag::find(1);

   $post->tags()->save($tag);

   $video = Video::create(['name'=>'My first video']);

   $tag2 = Tag::find(2);

   $video->tags()->save($tag2);


});

Route::get('/read', function (){

   $post = Post::findOrFail(7);

   foreach ($post->tags as $tag){

       echo $tag;


    }


});


Route::get('/update', function (){

    $post = Post::findOrFail(7);

//    foreach ($post->tags as $tag){
//
//        return $tag->where(['name'=>'post'])->update(['name'=>'updated post']);
//
//
//    }

    $tag = Tag::find(2);

    //$post->tags()->save($tag);



});


Route::get('/delete', function (){

   $post = Post::find(7);

   foreach ($post->tags as $tag){

       $tag->whereId(1)->delete();
    }


});











