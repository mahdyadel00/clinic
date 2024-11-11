<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PriceList\StorePriceListRequest;
use App\Http\Requests\Admin\PriceList\UpdatePriceListRequest;
use App\Models\PriceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $price_lists = PriceList::paginate(10);

        return view('admin.price_lists.index', compact('price_lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.price_lists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePriceListRequest $request)
    {
        try{
            DB::beginTransaction();

            PriceList::create($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Price list created successfully');
            return redirect()->route('admin.price_lists.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('PriceListController@store: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            DB::beginTransaction();

            $price_list = PriceList::find($id);

            if(!$price_list){
                session()->flash('error', 'Price list not found');
                return back();
            }

            DB::commit();
            return view('admin.price_lists.edit', compact('price_list'));
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('PriceListController@edit: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriceListRequest $request, string $id)
    {
        try{
            DB::beginTransaction();

            $price_list = PriceList::find($id);

            if(!$price_list){
                session()->flash('error', 'Price list not found');
                return back();
            }

            $price_list->update($request->safe()->all());

            DB::commit();
            session()->flash('success', 'Price list updated successfully');
            return redirect()->route('admin.price_lists.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('PriceListController@update: ' . $e->getMessage());
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

            $price_list = PriceList::find($id);

            if(!$price_list){
                session()->flash('error', 'Price list not found');
                return back();
            }

            $price_list->delete();

            DB::commit();
            session()->flash('success', 'Price list deleted successfully');
            return redirect()->route('admin.price_lists.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error('PriceListController@destroy: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong');
            return back();
        }
    }
}
