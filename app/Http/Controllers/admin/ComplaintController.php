<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Complaint\StoreComplaintRequest;
use App\Http\Requests\Admin\Complaint\UpdateComplaintRequest;
use App\Models\Complaint;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints  = Complaint::paginate(10);

        return view('admin.complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients   = Patient::get();
        $doctors    = Doctor::get();

        return view('admin.complaints.create', compact('patients', 'doctors'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplaintRequest $request)
    {
        try{
            DB::beginTransaction();

            Complaint::create($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Complaint created successfully');
            return redirect()->route('admin.complaints.index');

        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Complaint create error: '. $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            DB::beginTransaction();

            $complaint  = Complaint::find($id);
            $patients   = Patient::get();
            $doctors    = Doctor::get();

            DB::commit();

            return view('admin.complaints.edit', compact('complaint', 'patients', 'doctors'));

        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Complaint edit error: '. $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintRequest $request, string $id)
    {
        try{
            DB::beginTransaction();

            Complaint::find($id)->update($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Complaint updated successfully');
            return redirect()->route('admin.complaints.index');

        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Complaint update error: '. $e->getMessage());
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

            Complaint::find($id)->delete();

            DB::commit();
            session()->flash('success', 'Complaint deleted successfully');
            return redirect()->route('admin.complaints.index');

        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Complaint delete error: '. $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }
}
