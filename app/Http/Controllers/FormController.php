<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardioEntry;
use App\Models\CardioType;
use Psy\Readline\Hoa\Console;

class FormController extends Controller
{
    public function index(){
        $cardioTypes = CardioType::all()->pluck('name', 'id');

        return view('form', ['cardioEntry' => new CardioEntry(), 'isEdit' => false, 'cardioTypes' => $cardioTypes]);
    }

    public function create(Request $request){
        $request->validate([
            'date'=>'required|date',
            'type'=>'required|exists:CardioTypes,id',
            'hour'=>'nullable|integer|required_without_all:minute,second',
            'minute'=>'nullable|integer|required_without_all:hour,second',
            'second'=>'nullable|integer|required_without_all:minute,hour',
            'distance'=>'required|numeric|min:0',
        ]);

        $totalDuration = ($request->hour ?? 0) * 3600 + ($request->minute ?? 0) * 60 + ($request->second ?? 0);
        if($totalDuration <= 0){
            return back()->withErrors(['duration' => 'At least 1 second of time is required.'])->withInput();
        }

        $data = [
            'user_id' => auth()->id(),
            'date' => date('Y/m/d', strtotime($request->date)),
            'type_id' => $request->type,
            'duration' => $totalDuration,
            'distance' => $request->distance,
        ];

        $cardioEntry = CardioEntry::create($data);

        if($cardioEntry){
            return redirect()->route('logView')->with('message', 'CardioEntry Created Successfully');
        }else{
            return response()->json(['message' => 'Failed to Create CardioEntry'], 500);
        }
    }

    public function edit(CardioEntry $cardioEntry){
        $cardioTypes = CardioType::all()->pluck('name', 'id');

        return view('form', ['cardioEntry' => $cardioEntry, 'isEdit' => true, 'cardioTypes' => $cardioTypes]);
    }

    public function update(Request $request, CardioEntry $cardioEntry){
        $request->validate([
            'date'=>'required|date',
            'type'=>'required|exists:CardioTypes,id',
            'hour'=>'nullable|integer|required_without_all:minute,second',
            'minute'=>'nullable|integer|required_without_all:hour,second',
            'second'=>'nullable|integer|required_without_all:minute,hour',
            'distance'=>'required|numeric|min:0',
        ]);

        $totalDuration = ($request->hour ?? 0) * 3600 + ($request->minute ?? 0) * 60 + ($request->second ?? 0);
        if($totalDuration <= 0){
            return back()->withErrors(['duration' => 'At least 1 second of time is required.'])->withInput();
        }

        $data = [
            'date' => date('Y/m/d', strtotime($request->date)),
            'type_id' => $request->type,
            'duration' => $totalDuration,
            'distance' => $request->distance,
        ];

        $cardioEntry->update($data);

        if($cardioEntry){
            return redirect()->route('logView')->with('message', 'CardioEntry Updated Successfully');
        }else{
            return response()->json(['message' => 'Failed to Update CardioEntry'], 500);
        }
    }
}
