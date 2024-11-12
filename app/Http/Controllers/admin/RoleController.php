<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);

        return view('admin.roles.index', compact('roles'), ['title' => __('dashboard.roles')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'groups' => 'required|array',
        ]);

        try {
            DB::beginTransaction();

            // Create the role with the provided name
            $role = Role::create(['name' => $validated['name']]);

            // Retrieve permission names if groups contain IDs
            $permissions = Permission::whereIn('id', $validated['groups'])->pluck('name')->toArray();

            // Assign permissions to the role
            foreach ($permissions as $permissionName) {
                $role->givePermissionTo($permissionName);
            }

            DB::commit();

            // Set success message and redirect
            session()->flash('success', 'Role created successfully');
            return redirect()->route('admin.roles.index');

        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error and return error response
            Log::error('Error creating role: ' . $e->getMessage());
            session()->flash('error', 'Failed to create role. Please try again.');
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

            $role           = Role::where('id', $id)->first();
            $permissions    = Permission::get();

            DB::commit();
            return view('admin.roles.edit', compact('role', 'permissions'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('error')->error('Error editing role: ' . $e->getMessage());
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Find the role by ID and handle if not found
            $role = Role::find($id);
            if (!$role) {
                session()->flash('error', 'Role not found');
                return redirect()->back();
            }
            $role->update(['name' => $validated['name']]);
            $permissions = Permission::whereIn('id', $request->groups)->pluck('name')->toArray();
            $role->syncPermissions($permissions);
            DB::commit();

            // Set success message and redirect
            session()->flash('success', 'Role updated successfully');
            return redirect()->route('admin.roles.index');

        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error and flash an error message
            Log::channel('error')->error("Error updating role: {$e->getMessage()}");
            session()->flash('error', 'Failed to update role. Please try again.');

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

            $role = Role::with('users')->find($id);
            if ($role->users->isNotEmpty()) {
                session()->flash('error', __('role is in use!'));
                return response()->json(['error' => __('role is in use!')]);
            }

            $role->delete();

            DB::commit();
            session()->flash('Role deleted successfully');
            return redirect()->route('admin.roles.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('error')->error('Error deleting role: ' . $e->getMessage());
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
