<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Tables\Permissions;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('admin.permissions.index', [
      'permissions' => Permissions::class
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.permissions.create', [
      'roles' => Role::pluck('name', 'id')->toArray()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StorePermissionRequest $request)
  {
    $permission = Permission::create($request->validated());
    $permission->syncRoles($request->roles);
    Splade::toast('Permission created')->autoDismiss(3);

    return to_route('admin.permissions.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Permission $permission)
  {
    return view('admin.permissions.edit', [
      'roles' => Role::pluck('name', 'id')->toArray(),
      'permission' => $permission,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdatePermissionRequest $request, Permission $permission)
  {
    $permission->update($request->validated());
    $permission->syncRoles($request->roles);
    Splade::toast('Permission updated')->autoDismiss(3);

    return to_route('admin.permissions.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Permission $permission)
  {
    $permission->delete();
    Splade::toast('Permission deleted')->autoDismiss(3);

    return back();
  }
}
