<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\video;
use App\Models\categories;
use App\Models\comment;
use App\Models\limit;
use App\Models\like;
use App\Models\dislike;

class MainController extends Controller
    {
        public function addvideo() {
            $categories= categories::all();
            return view('addvideo', ['categories' => $categories ]);
        }
    
        public function addvideo_valid(Request $request) {
            $request->validate(
                [
                    'title_video' => 'required',
                    'description' => 'required',
                    'categories' => 'required',
                    'video' => 'required',
                ],
                [
                    'title_video.required' => 'Поле обязательно для заполнения',
                    'description.required' => 'Поле обязательно для заполнения',
                    'categories.required' => 'Поле обязательно для заполнения',
                    'video.required' => 'Поле обязательно для заполнения',
                ],
            );
            $infoRolic=$request->all();
            $author=Auth::user()->id;
    
            $video_info = $request->file('video')->hashName();
            $path_video = $request->file('video')->store('/public/video');
    
            $video=video::create([
                "title_video" => $infoRolic['title_video'],
                'video' => $video_info,
                "description" =>  $infoRolic['description'],
                "users" => $author,
                "categories" => $infoRolic['categories'],
                "status" => 1,
            ]);
    
            if ($video) {
                return redirect('/') -> with('myvideo','Добавлено видео');
            } else {
                return redirect()->back()->with('error','Ошибка добавлегтя');
            }
        }
        public function video($id) {
            $videos=video::find($id);
            $comment=comment::where('video', $id)->get();
            return view('Video', ['video' => $videos, 'comment' => $comment ]);
        }
    
        public function comment_Add(Request $request,$id) {
            $comment = $request->all();
            $author=Auth::user()->id;
            $addComment = comment::create([
                "comment" => $comment["comment"],
                "video" => $id,
                "user_id" => $author,
            ]);
    
            if ($addComment ) {
                return redirect()->back()->with("addComment", "Вы добавили комментарии к видео");
            } else {
                return redirect()->back()->with("ErrorComment", "Ошибка добавление");
            }
        }
    }
