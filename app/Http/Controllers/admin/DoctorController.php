<?php

namespace App\Http\Controllers\admin;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Traits\UploadFile;
use App\Models\Major;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{

    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::paginate('10');

        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();

        return view('admin.doctors.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        try{
            DB::beginTransaction();

            $doctor = Doctor::create($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Doctor created successfully');
            return redirect()->route('admin.doctors.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in store doctor: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       try{
           DB::beginTransaction();

              $doctor = Doctor::find($id);

              if(!$doctor){
                  session()->flash('error', 'Doctor not found');
                  return redirect()->back();
              }

                $users = User::get();

                DB::commit();
                return view('admin.doctors.edit', compact('doctor', 'users'));
         }catch(\Exception $e){
                DB::rollBack();
                Log::channel('error')->error('Error in edit doctor: '.$e->getMessage());
                session()->flash('error', 'Something went wrong');
                return redirect()->back();
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, $id)
    {
        try{
            DB::beginTransaction();

            $doctor = Doctor::find($id);

            if(!$doctor){
                session()->flash('error', 'Doctor not found');
                return redirect()->back();
            }

            $doctor->update($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Doctor updated successfully');
            return redirect()->route('admin.doctors.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in update doctor: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();

            $doctor = Doctor::find($id);

            if(!$doctor){
                session()->flash('error', 'Doctor not found');
                return redirect()->back();
            }

            $doctor->delete();

            DB::commit();
            session()->flash('success', 'Doctor deleted successfully');
            return redirect()->route('admin.doctors.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in delete doctor: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }
}
