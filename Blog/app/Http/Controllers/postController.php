<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\post;


class postController extends Controller
{


    //add post to dataBase 
    public function addPOST(Request $request)
    {
        // validate  request
        $request->validate([
            'body'  => 'required',
            // 'image' => ['nullable', new image(), 'max:2048']
            'image'  => 'nullable|mimes:jpeg,png,svg,jpg|max:2048'
        ]);


        // check if there is a image uploaded 
        if ($request->hasFile("image")) {
            $imagename = time() . '.' . $request->image->extension(); // make uniq imagename
            $request->image->storeAs("images", $imagename, 'public'); // store image in storage/public/images
            // create post and save it in database
            $post = post::create([
                'body'        => $request->body,
                'img'         => $imagename,
                'user_id'     => $request->userId
            ]);
        } else {
            // create post and save it in database without image
            $post = post::create([
                'body'        => $request->body,
                'user_id'     => $request->userId
            ]);
        }

        if ($post) {
            // redirect to back on success
            return redirect()->back()->with("message", "post added successfuly");
        }
    }

    public function showPosts()
    {
        // retrive all posts 
        $posts = post::all();
        if ($posts) {
            return view('posts')->with('posts', $posts);
        }
    }

    // show post by id
    public function showPost($id)
    {
        // find the post by id
        // $post = post::find($id);
        // $post = post::where('id','=',$id)->first();
        $post = post::find($id);



        // return the view for post if you find it
        if ($post) {
            return view('post')->with('post', $post);
        } else {
            abort(404); // on incorrect id rise an 404 page
        }
    }

    // delete post by id
    public function deletePost($id)
    {
        // delete psot
        $result  = post::destroy($id);

        // on success redirect to posts
        if ($result) {
            return redirect()->route('posts');
        } else {
            abort(404); // on fail rise 404 page
        }
    }

    // return update page 
    public function showUpdatePost($id)
    {

        //get post for update by its id or show 404 page on incorrect id
        $post = post::findorfail($id);


        // show update page
        return view('update')->with('post', $post);
    }
    public function updatePost($id,Request $request)
    {

        //get post for update by its id or show 404 page on incorrect id
        $post = post::findorfail($id);

        $image = empty($request->image) ? "default.png" : $request->image;

        // update the data
        $post->body = $request->body;
        $post->img = $image;

       $result = $post->save();

        if($result){
            return redirect()->back()->with('message',"update successfuly");
        }
        
    }
}
