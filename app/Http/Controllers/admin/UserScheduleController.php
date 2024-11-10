<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorScheduleShift\UpdateDoctorScheduleRequest;
use App\Http\Requests\Admin\UserSchedule\StoreUserScheduleRequest;
use App\Http\Requests\Admin\UserSchedule\UpdateUserScheduleRequest;
use App\Models\User;
use App\Models\UserSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_schedules = UserSchedule::paginate(10);

        return view('admin.user_schedules.index', compact('user_schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();

        return view('admin.user_schedules.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserScheduleRequest $request)
    {
        try{
            DB::beginTransaction();
            $user_schedule = UserSchedule::create($request->safe()->all());

            DB::commit();
            session()->flash('success', 'User Schedule created successfully');
            return redirect()->route('admin.user-schedules.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error creating user schedule: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            DB::beginTransaction();
            $user_schedule = UserSchedule::find($id);
            if(!$user_schedule){
                session()->flash('error', 'User Schedule not found');
                return redirect()->back();
            }
            $users = User::get();
            return view('admin.user_schedules.edit', compact('user_schedule', 'users'));
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error editing user schedule: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserScheduleRequest $request, string $id)
    {
        try{
            DB::beginTransaction();
            $user_schedule = UserSchedule::find($id);
            if(!$user_schedule){
                session()->flash('error', 'User Schedule not found');
                return redirect()->back();
            }
            $user_schedule->update($request->safe()->all());

            DB::commit();
            session()->flash('success', 'User Schedule updated successfully');
            return redirect()->route('admin.user-schedules.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error updating user schedule: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();
            $user_schedule = UserSchedule::find($id);
            if(!$user_schedule){
                session()->flash('error', 'User Schedule not found');
                return redirect()->back();
            }
            $user_schedule->delete();

            DB::commit();
            session()->flash('success', 'User Schedule deleted successfully');
            return redirect()->route('admin.user-schedules.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error deleting user schedule: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }
}
