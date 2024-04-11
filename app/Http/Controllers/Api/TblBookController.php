<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TblBook;
use App\Http\Resources\BookDataResource;

class TblBookController extends Controller
{
    public function index () 
    {
        $books = TblBook::orderBy('created_at', 'desc')->get();
        $books = BookDataResource::collection($books);
        
        if ($books) {
            return [
                'status' => 200,
                'books' => $books,
                'message' => 'Book List'
            ];
        } else {
            return [
                'status' => 500,
                'books' => [],
                'message' => 'Unknown Error Occur!'
            ];
        }
    }
}
