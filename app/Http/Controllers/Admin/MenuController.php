<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use function foo\func;
use Illuminate\Http\Request;
use DataTables;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $data = numrows(Menu::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a href="'.route('menu.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('menu.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('menu.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->make(true);

    }
    
    public function index()
    {
        $data = Menu::all();
        return view('admin.menus.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menus.create');
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
            'name' => 'required'
        ]);

        $menu = new Menu([
            'name' => $request->get('name')
          ]);
        $menu->save();
   
        return redirect()->route('menu.index')
            ->with('success','menu created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $data)
    {
        return view('admin.menus.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $data)
    {
        return view('admin.menus.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $data)
    {
        $request->validate([
            'name'=>'required'
          ]);

        $data->update($request->all());
    
          return redirect('/menu')->with('success', 'Menu has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Menu::find($id);
        $data->delete();

        return redirect()->route('menu.index')
            ->with('success','menu deleted successfully');
    }
}
