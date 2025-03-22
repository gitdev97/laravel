<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function getPosts(Request $request): mixed
    {
        $posts = Post::query();
        $per_page = 10;
        // Get the keyword from the request
        $keyword = $request->get('keyword', '');

        // Filter the records based on the keyword in any of the fields (title or notes)
        if(!empty($keyword)) {
            $posts->where('title', 'like', "%" . $keyword . "%");
        }

        $paginatedRecords = $posts->paginate($per_page);

        // Return paginated records along with pagination info
        return response()->json($paginatedRecords);
    }
}
