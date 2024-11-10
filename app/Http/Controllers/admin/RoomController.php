<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Room\StoreRoomRequest;
use App\Http\Requests\Admin\Room\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::paginate(10);

        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        try{
            DB::beginTransaction();

            Room::create($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Room created successfully');
            return redirect()->route('admin.rooms.index');

        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error creating room: '.$e->getMessage());
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

            $room = Room::find($id);

            if(!$room){
                session()->flash('error', 'Room not found');
                return back();
            }

            DB::commit();
            return view('admin.rooms.edit', compact('room'));

        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error editing room: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return back();
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, string $id)
    {
        try{
            DB::beginTransaction();

            $room = Room::find($id);

            if(!$room){
                session()->flash('error', 'Room not found');
                return back();
            }

            $room->update($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Room updated successfully');
            return redirect()->route('admin.rooms.index');

        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error updating room: '.$e->getMessage());
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

            $room = Room::find($id);

            if(!$room){
                session()->flash('error', 'Room not found');
                return back();
            }

            $room->delete();

            DB::commit();
            session()->flash('success', 'Room deleted successfully');
            return redirect()->route('admin.rooms.index');

        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('Error deleting room: '.$e->getMessage());
            session()->flash('error', 'Something went wrong');
            return back();
        }
    }
}
