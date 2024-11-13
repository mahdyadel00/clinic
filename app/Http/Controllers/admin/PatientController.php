<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Patient\StorePatientRequest;
use App\Http\Requests\Admin\Patient\UpdatePatientRequest;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::paginate(10);

        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();

        return view('admin.patients.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        try{
            DB::beginTransaction();
            $patient = Patient::create($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Patient created successfully');
            return redirect()->route('admin.patients.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('error')->error('Error PatientController@store: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return back();
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

            $patient = Patient::find($id);

            if(!$patient){
                session()->flash('error', 'Patient not found');
                return back();
            }

            $users = User::get();

            DB::commit();
            return view('admin.patients.edit', compact('patient', 'users'));

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('error')->error('Error PatientController@edit: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, string $id)
    {
        try{
            DB::beginTransaction();

            $patient = Patient::find($id);

            if(!$patient){
                session()->flash('error', 'Patient not found');
                return back();
            }

            $patient->update($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Patient updated successfully');
            return redirect()->route('admin.patients.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('error')->error('Error PatientController@update: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();

            $patient = Patient::find($id);

            if(!$patient){
                session()->flash('error', 'Patient not found');
                return back();
            }

            $patient->delete();

            DB::commit();
            session()->flash('success', 'Patient deleted successfully');
            return redirect()->route('admin.patients.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('error')->error('Error PatientController@destroy: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return back();
        }
    }
}
