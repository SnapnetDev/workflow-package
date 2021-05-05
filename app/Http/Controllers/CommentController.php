<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Traits\CommandTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    use ResponseTrait;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $this->resolveResponse(Comment::createComment());
    }

    public function show(Comment $comment)
    {

    }

    public function edit($id)
    {


    }

    public function update(Request $request, $id)
    {
        //
       return $this->resolveResponse(Comment::updateComment($id));

    }

    public function destroy($id)
    {
        //
       return $this->resolveResponse(Comment::deleteComment($id));
    }

}
