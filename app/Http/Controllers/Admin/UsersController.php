<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::with('role')->get();

        return view('layouts.admin.users.index', compact('roles', 'users'));
    }

    public function store(StoreUserRequest $request)
    {
        $destinationpath = 'uploads/users/';

        $data = $request->except('password', 'image_icon');

        $data['password'] = bcrypt($request->password);

        $imageFile = $request->image_icon;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "user_" . time();
            $attachment = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image_icon'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        // dd($data);
        $user = User::create($data);
        if ($user) {
            return redirect()->route('admin.users.index')
                ->withSuccessMessage('User is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('User can not be added.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('layouts.admin.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $destinationpath = 'uploads/users/';

        $data = $request->except('_token', '_method', 'image_icon');

        $imageFile = $request->image_icon;

        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'user_' . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image_icon'] = isset($image) ? $new_file_name . $extension : null;
        }
        // dd($data);
        $user = User::where('id', $id)->update($data);
        if ($user) {
            return redirect()->route('admin.users.index')->withSuccessMessage('User is updated successfully.');
        }
        return redirect()->back()->withInput()->withWarningMessage('User can not be updated.');
    }
}
