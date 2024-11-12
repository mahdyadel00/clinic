<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try{
            DB::beginTransaction();

            $user = User::create($request->safe()->all());

            DB::commit();
            session()->flash('success', 'User created successfully');
            return redirect()->route('admin.users.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in UserController@store: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.users.index');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            DB::beginTransaction();

            $user = User::find($id);

            if(!$user){
                session()->flash('error', 'User not found');
                return redirect()->route('admin.users.index');
            }

            DB::commit();
            return view('admin.users.edit', compact('user'));
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in UserController@edit: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.users.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try{
            DB::beginTransaction();

            $user = User::find($id);

            if(!$user){
                session()->flash('error', 'User not found');
                return redirect()->route('admin.users.index');
            }
            $user->update($request->safe()->all());

            DB::commit();
            session()->flash('success', 'User updated successfully');
            return redirect()->route('admin.users.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in UserController@update: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();

            $user = User::find($id);

            if(!$user){
                session()->flash('error', 'User not found');
                return redirect()->route('admin.users.index');
            }
            $user->delete();

            DB::commit();
            session()->flash('success', 'User deleted successfully');
            return redirect()->route('admin.users.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in UserController@destroy: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.users.index');
        }
    }
}
