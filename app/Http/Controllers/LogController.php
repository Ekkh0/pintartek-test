<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardioEntry;

class LogController extends Controller
{
    public function index(Request $request){
        $filter = $request->query('filter');

        $cardioEntries = CardioEntry::with('cardioType')
        ->where('user_id', auth()->user()->id)
        ->whereHas('cardioType', function($query) use ($filter) {
            # check if there is a filter passed to this function and filter the cardio type if there is
            if ($filter) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($filter) . '%']);
            }
        })
        ->orderBy('date', 'desc')
        ->paginate(15);

        return view('log', ['cardioEntries' => $cardioEntries]);
    }

    public function delete(CardioEntry $cardioEntry){
        # ensure the logged user is the one deleting their entry
        if ($cardioEntry->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $cardioEntry->delete();

        return redirect()->back()->with('success', 'CardioEntry Deleted Successfully');
    }
}
