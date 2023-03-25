<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms =Room::with('grade')->orderBy('id' ,'desc')->Paginate(15);
        return response()->view('cms.room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $grades = Grade::all();
       return response()->view('cms.room.create' ,compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() ,[
            'name' => 'required|string|min:4' ,
            'grade_id' => 'required' ,


        ]);

        if(! $validator->fails()){
            $rooms = new Room();
            $rooms->name = $request->input('name');
            $rooms->grade_id = $request->input('grade_id');



            $isSaved = $rooms->save();

            return response()->json(['icon' => $isSaved ? 'success' : 'error' , 'title' => $isSaved ? "Created is Successfully" : "Created is Failed"] , $isSaved ? 200 : 400);

        }

        else{
            return response()->json(['icon' => 'error' , 'title' =>$validator->getMessageBag()->first()] , 400);
        }
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
        $rooms = Room::findOrFail($id);
        $grades = Grade::all();
        return response()->view('cms.room.edit' , compact('rooms' ,'grades'));
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
        $validator = Validator($request->all() ,[
            'name' => 'required|string|min:4' ,
            'grade_id' => 'required' ,


        ]);

        if(! $validator->fails()){
            $rooms = Room::findOrFail($id);
            $rooms->name = $request->input('name');
            $rooms->grade_id = $request->input('grade_id');



            $isUpdate = $rooms->save();
            return ['redirect' => route('rooms.index')];
            return response()->json(['icon' => $isUpdate ? 'success' : 'error' , 'title' => $isUpdate ? "Created is Successfully" : "Created is Failed"] , $isUpdate ? 200 : 400);

        }

        else{
            return response()->json(['icon' => 'error' , 'title' =>$validator->getMessageBag()->first()] , 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
