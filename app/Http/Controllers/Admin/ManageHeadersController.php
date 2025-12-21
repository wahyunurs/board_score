<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageHeadersController extends Controller
{
    // View to manage headers
    public function index()
    {
        return view('admin.manage-headers.index');
    }
}
