<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentOwner;
use Yajra\Datatables\Datatables;

class ContentOwnerController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->ajax()) {
            $contentOwners = ContentOwner::orderBy('created_at', 'desc')->get();
            return DataTables::of($contentOwners)
                            ->addIndexColumn()
                            ->make(true);
        }
        return view('content-owners.index');
    }
}
