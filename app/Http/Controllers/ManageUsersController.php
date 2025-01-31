<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        // Get users role user
        $users = User::where('role', 'user')->get();

        return view('admin.manage-users.index', compact('users'));
    }
}
