<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;
use Yajra\Datatables\Datatables;

class PublisherController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->ajax()) {
            $publishers = Publisher::orderBy('created_at', 'desc')->get();
            return DataTables::of($publishers)
                            ->addIndexColumn()
                            ->make(true);
        }
        return view('publishers.index');
    }
}
