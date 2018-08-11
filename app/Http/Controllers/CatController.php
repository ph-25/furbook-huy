<?php

namespace App\Http\Controllers;

use App\Http\Request\CatRequest;
use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Illuminate\Support\Facades\DB::enableQueryLog();
        $cats = \App\Models\Cat::all();
        return view('cats/cats')->with('cats', $cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatRequest $request)
    {
        $data = $request->all();
        $cat = \App\Models\Cat::create($data);
        return redirect('/cats/' . $cat->id)->withSuccess('Cerate cat success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = \App\Models\Cat::find($id);
        return View('cats.show')->with('cat', $cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = \App\Models\Cat::find($id);
        return view('cats.edit', compact("cat"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = \App\Models\Cat::find($id);
        if (empty($cat)) {
            return about(404);
        }
        $cat->name = request('name');
        $cat->date_of_birth = request('date_of_birth');
        $cat->breed_id = request('breed_id');
        if ($cat->save()) {
            return redirect("cats");
        } else {
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Cat::find($id);
        if (empty($cat)) {
            return about(404);
        }
        if ($cat->delete()) {
            return redirect()->to(route('cats.index'));
        }
        return about(404);
    }
}
