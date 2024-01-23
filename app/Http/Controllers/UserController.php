<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //index
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            })
            ->paginate(6);
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.dashboard');
    }

    public function edit($id)
    {
        return view('pages.dashboard');
    }

    public function update(Request $request, $id)
    {
        return view('pages.dashboard');
    }

    public function destroy($id)
    {
        return view('pages.dashboard');
    }
}
