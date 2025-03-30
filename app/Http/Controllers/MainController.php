<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\CardioEntry;

class MainController extends Controller
{
    public function index(){
        $daysAgo = Carbon::today()->subDays(7);
        $cardioEntries = CardioEntry::with('cardioType')
        ->where('user_id', auth()->user()->id)
        ->where('date', '>=', $daysAgo)
        ->orderBy('date', 'desc')
        ->paginate(5);

        $duration = $cardioEntries->sum('duration');
        $hours = floor($duration / 3600);
        $duration %= 3600;
        $minutes = floor($duration / 60);
        $totalDuration = ['hours' => $hours, 'minutes' => $minutes];

        $totalDistance = $cardioEntries->sum('distance');

        return view('main', ['cardioEntries' => $cardioEntries, 'cardioEntriesCount' => $cardioEntries->count(), 'totalDuration' => $totalDuration, 'totalDistance' => $totalDistance]);
    }
}
