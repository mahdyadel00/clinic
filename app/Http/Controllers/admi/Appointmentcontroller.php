<?php

namespace App\Http\Controllers\admi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Admin\Appointment\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Appointmentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments  = Appointment::paginate(10);

        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients   = Patient::get();
        $doctors    = Doctor::get();

        return view('admin.appointments.create', compact('patients', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        try{
            DB::beginTransaction();

            $appointment = Appointment::create($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Appointment created successfully');
            return redirect()->route('admin.appointments.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in AppointmentController@store: ' . $e->getMessage() . ' on line ' . $e->getLine() . ' in file ' . $e->getFile());
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

            $appointment = Appointment::where('id', $id)->first();

            if(!$appointment){
                session()->flash('error', 'Appointment not found');
                return redirect()->back()->with('error', 'Appointment not found');
            }

            $patients   = Patient::get();
            $doctors    = Doctor::get();

            DB::commit();
            return view('admin.appointments.edit', compact('appointment', 'patients', 'doctors'));
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in AppointmentController@edit: ' . $e->getMessage() . ' on line ' . $e->getLine() . ' in file ' . $e->getFile());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, string $id)
    {
        try{
            DB::beginTransaction();

            $appointment = Appointment::where('id', $id)->first();

            if(!$appointment){
                session()->flash('error', 'Appointment not found');
                return redirect()->back()->with('error', 'Appointment not found');
            }

            $appointment->update($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Appointment updated successfully');
            return redirect()->route('admin.appointments.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in AppointmentController@update: ' . $e->getMessage() . ' on line ' . $e->getLine() . ' in file ' . $e->getFile());
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

            $appointment = Appointment::where('id', $id)->first();

            if(!$appointment){
                session()->flash('error', 'Appointment not found');
                return redirect()->back()->with('error', 'Appointment not found');
            }

            $appointment->delete();

            DB::commit();
            session()->flash('success', 'Appointment deleted successfully');
            return redirect()->route('admin.appointments.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error in AppointmentController@destroy: ' . $e->getMessage() . ' on line ' . $e->getLine() . ' in file ' . $e->getFile());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }
}
