<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // View to show dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // View to show the list of users
    public function manageUsers()
    {
        return view('admin.manage-users.index');
    }

    // View to create a new user
    public function createUser()
    {
        return view('admin.manage-users.create');
    }

    // View to edit a user
    public function editUser($id)
    {
        return view('admin.manage-users.edit', compact('id'));
    }

    // View to delete a user
    public function deleteUser($id)
    {
        return view('admin.manage-users.delete', compact('id'));
    }

    // View to show the list of teams
    public function manageTeams()
    {
        return view('admin.manage-teams.index');
    }

    // View to create a new team
    public function createTeam()
    {
        return view('admin.manage-teams.create');
    }

    // View to edit a team
    public function editTeam($id)
    {
        return view('admin.manage-teams.edit', compact('id'));
    }

    // View to delete a team
    public function deleteTeam($id)
    {
        return view('admin.manage-teams.delete', compact('id'));
    }
}
