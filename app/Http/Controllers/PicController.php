<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PicController extends Controller
{
    public string $obj = 'PIC';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pics = Pic::latest()->get();
        return view('masters.pic', compact('pics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'=>'required|string',
        ]);

        $pic = Pic::create($validated);

        return response()->json([
            'status'=>'success',
            'message' => 'Data ' . $this->obj . ' berhasil ditambahkan',
            'data'=>$pic
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pic $pic)
    {
        return response()->json($pic);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pic $pic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pic $pic)
    {
        $validated = $request->validate([
            'nama'  => 'required|string',
        ]);

        $pic->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data ' . $this->obj . ' berhasil diperbaharui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pic $pic)
    {
        $pic->delete();

        return response()->json([
            'status'=>'success',
            'message' => 'Data ' . $this->obj . ' berhasil dihapus',
        ]);
    }
}
