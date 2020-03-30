<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;
use DataTables;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $hotel = Hotel::latest()->get();
            return DataTables::of($hotel)
                                ->addIndexColumn()
                                ->addColumn('action', function($hotel) {
                                    $button = '<a href="'.route('hotel.edit', $hotel->id).'" type="button" name="edit" class="edit btn btn-info">Edit</a>&nbsp;&nbsp;';
                                    $button .= '<button type="button" delete_value="'.$hotel->id.'" class="delete btn btn-danger">Delete</button>';
                                    return $button;
                                })
                                ->rawColumns(['action'])
                                ->make(true);
        }
        return view('data_hotel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'address'   => 'required',
        ]);

        Hotel::create([
            'name'      => $request->name,
            'address'   => $request->address,
            'maps'      => "https://www.google.com/maps/search/?api=1&query=".$request->latitude.",".$request->longitude,
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('hotel.index')->with('success', 'Hotel Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('data_hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'address'   => 'required',
        ]);

        $hotel = [
            'name'      => $request->name,
            'address'   => $request->address,
            'maps'      => "https://www.google.com/maps/search/?api=1&query=".$request->latitude.",".$request->longitude,
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude,
        ];

        Hotel::whereId($id)->update($hotel);
        return redirect()->route('hotel.index')->with('success','Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();

        return redirect()->back()->with('success','Data Deleted!');
    }
}
