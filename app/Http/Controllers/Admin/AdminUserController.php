<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserFormRequest;
use App\Models\AdminUser;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = AdminUser::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.admin_users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin_users.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminUserFormRequest $request)
    {
        $data = $request->validated();

        $user = AdminUser::create($data);

        $user->roles()->sync($data['roles'] ?? []);

        return redirect()->route('admin.users.index');
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
        $user = AdminUser::query()
            ->findOrFail($id);

        return view('admin.admin_users.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUserFormRequest $request, string $id)
    {
        $adminUser = AdminUser::query()
            ->findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AdminUser::destroy($id);

        return redirect()->route('admin.admin_user.index');
    }
}
