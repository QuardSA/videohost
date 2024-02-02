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
use App\Models\User;

class MainController extends Controller
    {
        public function index() {
            $videos=video::where("limites",'1')->get()->take(10);
            return view('index', ['videos' => $videos]);
        }

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
                    'video' => 'required|mimes:mp4',
                ],
                [
                    'title_video.required' => 'Поле обязательно для заполнения',
                    'description.required' => 'Поле обязательно для заполнения',
                    'categories.required' => 'Поле обязательно для заполнения',
                    'video.required' => 'Поле обязательно для заполнения',
                    'video.mimes' => 'Только mp4',
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
                "limites" => 1,
            ]);

            if ($video) {
                return redirect('/') -> with('success','Добавлено видео');
            } else {
                return redirect()->back()->with('error','Ошибка добавлегтя');
            }
        }
        public function video($id) {
            $videos=video::find($id);
            $comment=comment::where('video', $id)->get();
            return view('Video', ['video' => $videos, 'comment' => $comment ]);
        }

        public function comment_create(Request $request,$id) {
            $comment = $request->all();
            $addComment = comment::create([
                "comment" => $comment["comment"],
                "video" => $id,
                "users" => Auth::user()->id,
            ]);

            if ($addComment ) {
                return redirect()->back()->with("success", "Вы добавили комментарии к видео");
            } else {
                return redirect()->back()->with("error", "Ошибка добавление");
            }
        }
        public function video_view($id) {
            $videos=video::find($id);
            $comment=comment::where('video', $id)->get();
            return view('video', ['video' => $videos, 'comment' => $comment ]);
        }
        public function personalVideo_view()
        {
            $idUser = Auth::user()->id;
            $videoUser = video::where('users', $idUser)->where('limites', '!=', '4')->get();
            return view('myvideo', ['videos' => $videoUser]);
        }



        public function index_admin()
        {
           $videos = video::with('limited')->get();
           $limit = limit::all();
           return view('admin.index', ['videos' => $videos, 'limit' => $limit]);
        }

        public function edit_limits(Request $request, video $id)
        {
            $update_limits = $id->update([
                "limites" => $request->limites,
            ]);

            if ($update_limits) {
                return redirect()->back()->with("success", "Статус изменён успешно");
            } else {
                return redirect()->back()->with("error", "Ошибка изменения статуса");
            }
        }


        public function like_add($id)
    {

        $author = Auth::user()->id;
        $existingDislike = dislike::where('id_user', $author)
        ->where('id_video', $id)
        ->first();
        if ($existingDislike) {
            return redirect()->back()->with('error', 'Вы не можете поставить лайк!');
      } else {
        $existingLike = like::where('id_user', $author)
        ->where('id_video', $id)
        ->first();


    if ($existingLike) {
        return redirect()->back()->with('error', 'Вы не можете поставить лайк!');
    } else {
        like::create([
            'id_user' => $author,
            'id_video' => $id,
        ]);
        return redirect()->back()->with('likes', 'Вы проставили лайк!');
    }
      }
    }

    public function Dislike_add($id)
    {

        $author = Auth::user()->id;

        $existingLike = like::where('id_user', $author)
        ->where('id_video', $id)
        ->first();
        if ($existingLike) {

            return redirect()->back()->with('error', 'Вы не можете поставить дизлайк!');

        } else {
            $existingDislike = dislike::where('id_user', $author)
            ->where('id_video', $id)
            ->first();


        if ($existingDislike) {
            return redirect()->back()->with('error', 'Вы не можете поставить диз!');
        } else {
            dislike::create([
                'id_user' => $author,
                'id_video' => $id,
            ]);
            return redirect()->back()->with('dislike', 'Вы проставили Диз!');
        }

     }
    }
    }
