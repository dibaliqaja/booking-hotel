<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use DataTables;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $room = Room::latest()->get();
            return DataTables::of($room)
                                ->addIndexColumn()
                                ->addColumn('action', function($room) {
                                    $button = '<a href="'.route('room.edit', $room->id).'" type="button" name="edit" class="edit btn btn-info">Edit</a>&nbsp;&nbsp;';
                                    $button .= '<button type="button" delete_value="'.$room->id.'" class="deleteRoom btn btn-danger">Delete</button>';
                                    return $button;
                                })
                                ->rawColumns(['action'])
                                ->make(true);
        }
        return view('data_room.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_room.create');
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
            'quantity'   => 'required',
            'price'   => 'required',
        ]);

        Room::create([
            'name'       => $request->name,
            'quantity'   => $request->quantity,
            'price'      => $request->price,
        ]);

        return redirect()->route('room.index')->with('success', 'Room Added!');
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
        $room = Room::find($id);
        return view('data_room.edit', compact('room'));
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
            'quantity'   => 'required',
            'price'   => 'required',
        ]);

        $room = [
            'name'       => $request->name,
            'quantity'   => $request->quantity,
            'price'      => $request->price,
        ];

        Room::whereId($id)->update($room);
        return redirect()->route('room.index')->with('success', 'Room Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();

        return redirect()->back()->with('success','Room Deleted!');
    }
}
