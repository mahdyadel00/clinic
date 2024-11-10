<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorScheduleShift\StoreDoctorScheduleRequest;
use App\Http\Requests\Admin\DoctorScheduleShift\UpdateDoctorScheduleRequest;
use App\Models\Doctor;
use App\Models\DoctorScheduleShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DoctorScheduleShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctorScheduleShifts = DoctorScheduleShift::paginate(10);

        return view('admin.doctor_schedule_shift.index', compact('doctorScheduleShifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::get();

        return view('admin.doctor_schedule_shift.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorScheduleRequest $request)
    {
        try{
            DB::beginTransaction();

            DoctorScheduleShift::create($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Doctor schedule shift created successfully.');
            return redirect()->route('admin.doctor-schedule-shifts.index')->with('success', 'Doctor schedule shift created successfully.');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('DoctorScheduleShiftController/store - Error: '. $e->getMessage());
            session()->flash('error', 'Something went wrong.');
            return redirect()->back()->with('error', 'Something went wrong.');
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

            $doctorScheduleShift = DoctorScheduleShift::find($id);
            $doctors             = Doctor::get();

            if(!$doctorScheduleShift){
                session()->flash('error', 'Doctor schedule shift not found.');
                return redirect()->back()->with('error', 'Doctor schedule shift not found.');
            }

            DB::commit();
            return view('admin.doctor_schedule_shift.edit', compact('doctorScheduleShift', 'doctors'));
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('DoctorScheduleShiftController/edit - Error: '. $e->getMessage());
            session()->flash('error', 'Something went wrong.');
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorScheduleRequest $request, string $id)
    {
        try{
            DB::beginTransaction();

            $doctorScheduleShift = DoctorScheduleShift::find($id);

            if(!$doctorScheduleShift){
                session()->flash('error', 'Doctor schedule shift not found.');
                return redirect()->back()->with('error', 'Doctor schedule shift not found.');
            }

            $doctorScheduleShift->update($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Doctor schedule shift updated successfully.');
            return redirect()->route('admin.doctor-schedule-shifts.index')->with('success', 'Doctor schedule shift updated successfully.');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('DoctorScheduleShiftController/update - Error: '. $e->getMessage());
            session()->flash('error', 'Something went wrong.');
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();

            $doctorScheduleShift = DoctorScheduleShift::find($id);

            if(!$doctorScheduleShift){
                session()->flash('error', 'Doctor schedule shift not found.');
                return redirect()->back()->with('error', 'Doctor schedule shift not found.');
            }

            $doctorScheduleShift->delete();

            DB::commit();
            session()->flash('success', 'Doctor schedule shift deleted successfully.');
            return redirect()->route('admin.doctor-schedule-shifts.index')->with('success', 'Doctor schedule shift deleted successfully.');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('DoctorScheduleShiftController/destroy - Error: '. $e->getMessage());
            session()->flash('error', 'Something went wrong.');
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
