<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showAll()
    {
        $users = User::all();
        if ($users->isEmpty()) {
            return response()->json('There are no users', 404);
        }

        return $users;
    }

    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json('User not found', 404);
        }  

        return $user;
    }

    public function store(Request $request)
    {
        $this->validate_store($request);

        try {
            $requestData = $request->all();
            $requestData['password'] = Hash::make($request->password);
            User::create($requestData);
            return response()->json('User was created succesfully', 201);
        } catch (\Exception $e) {
            return response()->json('User could not be created, please try again later', 500);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($request->id);
        if (is_null($user)) {
            return response()->json('User not found', 404);
        }

        $this->validate_update($request);

        $requestData = $request->all();
        $requestData['password'] = Hash::make($request->password);

        try {
            $user->fill($requestData)->save();
            return response()->json('User was updated succesfully', 201);
        } catch (\Exception $e) {
            return response()->json('User could not be updated, please try again later', 500);
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json('User not found', 404);
        }

        try {
            $user->delete();
            return response()->json('User was deleted succesfully', 201);
        } catch (\Exception $e) {
            return response()->json('User could not be deleted, please try again later', 500);
        }
    }

    private function validate_store($request)
    {
        return $this->validate($request, [
            'name' => 'required|max:255',
            'phone_number' => 'required|max:20',
            'email' => 'required|max:255',
            'password' => 'required|max:255'
        ]);
    }

    private function validate_update($request)
    {
        return $this->validate($request, [
            'name' => 'sometimes|required|max:255',
            'phone_number' => 'sometimes|required|max:20',
            'email' => 'sometimes|required|max:255',
            'password' => 'sometimes|required|max:255'
        ]);
    }
}