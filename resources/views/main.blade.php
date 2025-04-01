@extends('layouts.master')

@section('title', 'CardiNote')

@section('css')
<link rel="stylesheet" href="css/main.css">
@endsection

@section('content')
<h2 class="d-flex justify-content-center">
    Don't forget to do your cardio!
</h2>
<div>
    @if ($cardioEntriesCount == 0)
        You haven't done any cardio this week yet. Time to start!
    @else
        You're doing great! This week you have done a total of 
        @if ($totalDuration['hours'] > 0)
            {{ $totalDuration['hours'] }} hours and {{ $totalDuration['minutes'] }} minutes
        @elseif ($totalDuration['minutes'] > 0)
            {{ $totalDuration['minutes'] }} minutes
        @endif
        of cardio from {{ $cardioEntriesCount == 1 ? $cardioEntriesCount.' activity' : $cardioEntriesCount.' activities'}} and traversed across {{ $totalDistance }} Km of distance.
        <div class="mt-3">
            <h4>This Week's Cardio Activities</h4>
        </div>
        <table class="table table-bordered mt-3">
            <thead class="align-middle">
                <tr>
                    <th scope="col">
                        #
                    </th>
                    <th scope="col" style="width: 15%;">
                        Type
                    </th>
                    <th scope="col">
                        Duration
                    </th>
                    <th scope="col">
                        Distance (Km)
                    </th>
                    <th scope="col">
                        Pace (Min/Km)
                    </th>
                    <th scope="col">
                        Date
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cardioEntries as $key => $entry)
                <tr class="align-middle">
                    <th scope="row">{{ $cardioEntries->firstItem() + $key }}</th>
                    <td>
                        <div class="d-flex gap-2" style="height: 100%;">
                            <iconify-icon style="width: 20px;"
                                icon="{{ $entry->cardioType ? $entry->cardioType->image : 'fa-solid:question'}}"
                                style="font-size: 14px;"></iconify-icon>
                            <div>
                                {{ $entry->cardioType ? $entry->cardioType->name : 'Unknown' }}
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php $duration = $entry->formatDuration() ?>
                        {{$duration['hours'] ? str_pad($duration['hours'], 2, '0', STR_PAD_LEFT) . ' :' : '' }}
                        {{$duration['minutes'] ? str_pad($duration['minutes'], 2, '0', STR_PAD_LEFT) . ' :' : '00 :' }}
                        {{str_pad($duration['seconds'], 2, '0', STR_PAD_LEFT)}}
                    </td>
                    <td>{{ $entry->distance }}</td>
                    <td>{{ $entry->formatPace() }}</td>
                    <td>{{ $entry->date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {{ $cardioEntries->links() }}
        </div>
    @endif
</div>
<a href="{{ route('logView') }}" class="btn btn-primary">Start logging your cardio activities!</a>
@endsection