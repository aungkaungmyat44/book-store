<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentOwner;
use App\Models\Publisher;
use App\Models\TblBook;
use App\Http\Requests\BookRequest;
use App\Http\Requests\BookUpdateRequest;
use Yajra\Datatables\Datatables;

class TblBookController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->ajax()) {
            $books = TblBook::orderBy('created_at', 'desc')->get();
            return DataTables::of($books)
                            ->addIndexColumn()
                            ->addColumn('content_owner', function($book) {
                                return ucfirst($book->contentOwner->name);
                            })
                            ->addColumn('publisher', function($book) {
                                return ucfirst($book->publisher->name);
                            })
                            ->addColumn('action', function($book){
                                $actionBtn = view('books.action', ['book' => $book])->render();
                                return $actionBtn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('books.index');
    }

    public function create(Request $request) 
    {
        $contentOwners = ContentOwner::orderBy('name', 'asc')->get();
        $publishers = Publisher::orderBy('name', 'asc')->get();
        $bookIdArr = TblBook::orderBy('created_at', 'DESC')
                                    ->pluck('book_uniq_id')
                                    ->toArray();
        
        if (empty($bookIdArr)) {
            $bookNumber = '0001';
        } else {
            $idArr = [];
            foreach ($bookIdArr as $key => $bookId) {
                if (strpos($bookId, "-") !== false) {
                    $idArr[] = substr($bookId, strpos($bookId, "-") + 1);
                }
            }
            sort($idArr);

            $bookNumber = str_pad(end($idArr) + 1, strlen(end($idArr)), "0", STR_PAD_LEFT);
        }
        $bookPrefix = 'Book-';
        $bookUniqueId = $bookPrefix.$bookNumber;
        
        return view('books.create', compact('contentOwners', 'publishers', 'bookUniqueId'));
    }

    public function store(BookRequest $request) 
    {
        $data = $request->all();
        $coverName = null;

        if($request->hasFile('cover_photo')){
            $coverName = time().'.'.$request->cover_photo->extension();
            $request->cover_photo->move(public_path('images/books'), $coverName);
        }
        
        $payLoad = [
            'name' => $data['name'],
            'book_uniq_id' => $data['unique_id'],
            'co_id' => $data['content_owner_id'],
            'publisher_id' => $data['publisher_id'],
            'cover_photo' => $coverName
        ];

        $result = TblBook::create($payLoad);
        if ($result) {
            return redirect()->route('books.index')->with('success', 'Book Has Created Sucessfully!');
        } else {
            return redirect()->route('books.index')->with('error', 'Book Create Failed!');
        }
    }

    public function show(TblBook $book) 
    {
        return view('books.show', compact('book'));
    }

    public function edit(TblBook $book) 
    {
        $contentOwners = ContentOwner::orderBy('name', 'asc')->get();
        $publishers = Publisher::orderBy('name', 'asc')->get();

        return view('books.edit', compact('contentOwners', 'publishers', 'book'));
    }

    public function update(BookUpdateRequest $request, TblBook $book) 
    {
        $data = $request->all();
        $coverName = $book->cover_photo;

        if($request->hasFile('cover_photo')){
            // delete old photo
            $fileToDelete = public_path("images/books/$book->cover_photo");
            if (file_exists($fileToDelete)) {
                unlink($fileToDelete);
            }

            $coverName = time().'.'.$request->cover_photo->extension();
            $request->cover_photo->move(public_path('images/books'), $coverName);
        }
        
        $payLoad = [
            'name' => $data['name'],
            'book_uniq_id' => $data['unique_id'],
            'co_id' => $data['content_owner_id'],
            'publisher_id' => $data['publisher_id'],
            'cover_photo' => $coverName
        ];

        $result = $book->update($payLoad);
        if ($result) {
            return redirect()->route('books.index')->with('success', 'Book Has Updated Sucessfully!');
        } else {
            return redirect()->route('books.index')->with('error', 'Book Update Failed!');
        }
    }

    public function destroy(TblBook $book) 
    {
        $result = $book->delete();
        if ($result) {
            $fileToDelete = public_path("images/books/$book->cover_photo");
            if (file_exists($fileToDelete)) {
                unlink($fileToDelete);
            }
            return redirect()->route('books.index')->with('success', 'Book Has Deleted Sucessfully!');
        } else {
            return redirect()->route('books.index')->with('error', 'Book Delete Failed!');
        }
    }
}
