<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostsResource;
use App\Http\Resources\ShowResource;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post){
        return new ShowResource($post);
    }
}
