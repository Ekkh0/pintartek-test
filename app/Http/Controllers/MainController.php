<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardioEntry;

class MainController extends Controller
{
    public function index(Request $request){
        $filter = $request->query('filter');

        $cardioEntries = CardioEntry::with('cardioType')
        ->where('user_id', auth()->user()->id)
        ->whereHas('cardioType', function($query) use ($filter) {
            if ($filter) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($filter) . '%']);
            }
        })
        ->get();

        return view('main', ['CardioEntries' => $cardioEntries]);
    }

    public function delete(CardioEntry $cardioEntry){
        $cardioEntry->delete();

        return redirect()->back()->with('success', 'CardioEntry Deleted Successfully');
    }
}
