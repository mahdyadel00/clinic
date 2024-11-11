<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WaitingReservation\StoreWaitingReservationRequest;
use App\Http\Requests\Admin\WaitingReservation\UpdateWaitingReservationRequest;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Room;
use App\Models\WaitingReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WaitingReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $waiting_reservations = WaitingReservation::paginate(10);

        return view('admin.waiting_reservations.index', compact('waiting_reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients  = Patient::get();
        $doctors   = Doctor::get();
        $rooms     = Room::get();

        return view('admin.waiting_reservations.create', compact('patients', 'doctors', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWaitingReservationRequest $request)
    {
       try{
           DB::beginTransaction();

             WaitingReservation::create($request->safe()->all());

                DB::commit();
                session()->flash('success', 'Waiting Reservation Created Successfully');
                return redirect()->route('admin.waiting_reservations.index');

         }catch(\Exception $ex){
                DB::rollback();
                Log::channel('error')->error('Error in WaitingReservationController@store Error: '. $ex->getMessage());
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

            $waiting_reservation = WaitingReservation::find($id);
            $patients  = Patient::get();
            $doctors   = Doctor::get();
            $rooms     = Room::get();

            if(!$waiting_reservation){
                session()->flash('error', 'Waiting Reservation Not Found');
                return redirect()->back();
            }

            DB::commit();
            return view('admin.waiting_reservations.edit', compact('waiting_reservation', 'patients', 'doctors', 'rooms'));

        }catch(\Exception $ex){
            DB::rollback();
            Log::channel('error')->error('Error in WaitingReservationController@edit Error: '. $ex->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWaitingReservationRequest $request, string $id)
    {
        try{
            DB::beginTransaction();

            $waiting_reservation = WaitingReservation::find($id);

            if(!$waiting_reservation){
                session()->flash('error', 'Waiting Reservation Not Found');
                return redirect()->back();
            }

            $waiting_reservation->update($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Waiting Reservation Updated Successfully');
            return redirect()->route('admin.waiting_reservations.index');

        }catch(\Exception $ex){
            DB::rollback();
            Log::channel('error')->error('Error in WaitingReservationController@update Error: '. $ex->getMessage());
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

            $waiting_reservation = WaitingReservation::find($id);

            if(!$waiting_reservation){
                session()->flash('error', 'Waiting Reservation Not Found');
                return redirect()->back();
            }

            $waiting_reservation->delete();

            DB::commit();
            session()->flash('success', 'Waiting Reservation Deleted Successfully');
            return redirect()->route('admin.waiting_reservations.index');

        }catch(\Exception $ex){
            DB::rollback();
            Log::channel('error')->error('Error in WaitingReservationController@destroy Error: '. $ex->getMessage());
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }
}
