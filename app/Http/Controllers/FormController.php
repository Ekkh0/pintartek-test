<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardioEntry;
use App\Models\CardioType;

class FormController extends Controller
{
    public function index(){
        $cardioTypes = CardioType::all()->pluck('name', 'id');

        return view('form', ['cardioEntry' => new CardioEntry(), 'isEdit' => false, 'cardioTypes' => $cardioTypes]);
    }

    public function create(Request $request){
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'date'=>'required|date',
            'type'=>'required|exists:CardioType,id',
            'duration'=>'required|integer|min:1',
            'distance'=>'required|numeric|min:0',
        ]);

        $data = [
            'user_id' => $request->user_id,
            'date' => $request->date,
            'type' => $request->type,
            'duration' => $request->duration,
            'distance' => $request->distance,
        ];

        $cardioEntry = CardioEntry::create($data);

        if($cardioEntry){
            return redirect()->route('mainView')->with('message', 'CardioEntry Created Successfully');
        }
    }

    public function edit(CardioEntry $cardioEntry){
        $cardioTypes = CardioType::all()->pluck('name', 'id');

        return view('form', ['cardioEntry' => $cardioEntry, 'isEdit' => true, 'cardioTypes' => $cardioTypes]);
    }

    public function update(Request $request, CardioEntry $cardioEntry){
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'date'=>'required|date',
            'type'=>'required|exists:CardioType,id',
            'duration'=>'required|integer|min:1',
            'distance'=>'required|numeric|min:0',
        ]);

        $data = [
            'user_id' => $request->user_id,
            'date' => $request->date,
            'type' => $request->type,
            'duration' => $request->duration,
            'distance' => $request->distance,
        ];

        $cardioEntry->update($data);

        if(!$cardioEntry){
            return response()->json(['message' => 'Failed to Update CardioEntry'], 500);
        }else{
            return response()->json(['message' => 'CardioEntry Updated Successfully', 'data' => $data], 200);
        }
    }
}
