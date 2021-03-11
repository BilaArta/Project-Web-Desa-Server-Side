<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateUserRegistration;
use App\Http\Requests\ValidateUserLogin;

use App\User;
use App\News;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register', 'loginWarga', 'addBerita']]);
    }

    // Admin===============================================================
    public function register(ValidateUserRegistration $request){
        \Log::info($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]); 
        return new UserResource($user); 
    }
    public function login(ValidateUserLogin $request){
      
        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return  response()->json([ 
                'errors' => [
                    'msg' => ['Incorrect username or password.']
                ]  
            ], 401);
        }
        $user = Auth::id();
        return response()->json([
            'type' =>'success',
            'message' => 'Logged in.',
            'id' => $user, 
            'token' => $token
        ]);
    }

    // Admin===============================================================

    public function addBerita(Request $request)
    {
        $new = new News([
            'deskripsi' => $request->input('deskripsi'),
            'judulBerita' => $request->input('judulBerita'),
            'file' => $request->file('file')
        ]);
        $new['created_by'] = 1;
        $jenis = $request->input('jenis');

        $file = $request->file('file');
        $image_uploaded_path = $file->store('images','public');
        $new['file'] = $image_uploaded_path;

        $new->save();
        $new->categories()->attach($jenis);

        return response()->json([
            'msg' => "sukses upload data",
            'data' => $new
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request   
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, News $news)
    {
        $news->update($request->all());
        return response()->json("success update news");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        \Log::info($id);
        $news = News::find($id);
        $news->delete();
        return response()->json("success delete news");
    }
 
    public function user()
    { 
       return new UserResource(auth()->user());
    }

}