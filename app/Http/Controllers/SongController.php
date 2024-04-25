<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    //
    public function viewSongs(){
        $song = Song::all();
        if($song->count() > 0){
            return response()->json([
                "status" => 200,
                "songs" => $song
            ], 200);
        }else{
            return response()->json([
                "status" => 404,
                "message" => "Songs Not Found"
            ],404);
        }
        
    }

    public function addSong(Request $request){
        $validator = Validator::make($request->all(),[
            'song_title' => 'required|string|max:191',
            'author_name' => 'required|string|max:191',
            'release_year' => 'required|digits:4'
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => 422,
                "message" => $validator->messages()
            ],422);
        }else{
            $song = Song::create([
                'song_title' => $request->song_title,
                'author_name' => $request->author_name,
                'release_year' => $request->release_year
            ]);
            if($song){
                return response()->json([
                    "status" => 200,
                    "message" => "Successfully Added Song!"
                ], 200);
            }else{
                return response()->json([
                    "status" => 400,
                    "message" => "Something Went Wrong!"
                ], 400);
            }
        }
    }

    public function viewSpecificSong($id){
        $song = Song::find($id);
        if($song){
            return response()->json([
                "status" => 200,
                "song" => $song
            ], 200);
        }else{
            return response()->json([
                "status" => 404,
                "message" => "Songs Not Found"
            ],404);
        }
    }

    public function editSong($id, Request $request){
        $validator = Validator::make($request->all(),[
            'song_title' => 'required|string|max:191',
            'author_name' => 'required|string|max:191',
            'release_year' => 'required|digits:4'
        ]);
        $song = Song::find($id);
        if($validator->fails()){
            return response()->json([
                "status" => 422,
                "message" => $validator->messages()
            ],422);
        }else{
            if($song){
                $song->update([
                    'song_title' => $request->song_title,
                    'author_name' => $request->author_name,
                    'release_year' => $request->release_year
                ]);
                return response()->json([
                    "status" => 200,
                    "message" => "Successfully Updated Song!"
                ], 200);
            }else{
                return response()->json([
                    "status" => 404,
                    "message" => "not found!!"
                ], 404);
            }
        }
    }

    public function deleteSong($id){
        $song = Song::find($id);
        if($song){
            $song->delete($id);
            return response()->json([
                "status" => 200,
                "message" => "Successfully Deleted Song!"
            ], 200);
        }else{
            return response()->json([
                "status" => 404,
                "message" => "Song Not Found"
            ], 404);
        }
    } 
}
