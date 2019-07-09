<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use function foo\func;
use Illuminate\Http\Request;
use DataTables;

class RoleController extends Controller
{
    /** get data table to show on method @index
     * @return mixed
     */
    public function datatables()
    {
        $data = numrows(Role::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('role.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('role.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('role.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->make(true);

    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = new Role([
            'name' => $request->get('name'),
            'name' => $request->get('description')
        ]);
        $data->save();

        return redirect()->route('role.index')
            ->with('success','Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $data)
    {
        return view('admin.roles.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $data)
    {
        return view('admin.roles.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $data)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);

        $data->update($request->all());

        return redirect('/role')->with('success', 'Role has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Role::find($id);
        $data->delete();

        return redirect()->route('role.index')
            ->with('success','role deleted successfully');
    }
}
