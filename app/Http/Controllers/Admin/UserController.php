<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use function foo\func;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    public function datatables()
    {
        $data = numrows(User::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('user.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('user.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('user.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->make(true);

    }

    public function index()
    {
        $data = User::all();
        return view('admin.users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = new User([
            'name' => $request->get('name'),
            'name' => $request->get('email'),
            'name' => $request->get('password')
        ]);
        $data->save();

        return redirect()->route('user.index')
            ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(User $data)
    {
        return view('admin.users.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function edit(User $data)
    {
        return view('admin.users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $data)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data->update($request->all());

        return redirect('/user')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->route('user.index')
            ->with('success','user deleted successfully');
    }
}
