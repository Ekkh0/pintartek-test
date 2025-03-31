@extends('layouts.master')

@section('title', 'CardiNote')

@section('css')
<link rel="stylesheet" href="css/main.css">
@endsection

@section('content')
<h2>
    Cardio Activity Logs
</h2>
<div class="mainTable">
    <a class="btn btn-primary mb-2" href="{{ route('createView') }}">
        <div class="d-flex gap-2 align-items-center">
            <iconify-icon icon="fa-solid:plus" style="font-size: 14px;"></iconify-icon>
            Add New Activity
        </div>
    </a>
    <table class="table table-bordered">
        <thead class="align-middle">
            <form action="{{ route('logView') }}" method="GET">
                @csrf
                <input type="hidden" name="sort" id="sort" value="{{ request('sort') }}">
                <input type="hidden" name="direction" id="direction" value="{{ request('direction') }}">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" style="width: 15%;">
                        <div class="d-flex gap-2 align-items-center">
                            Type
                            <input type="text" name="filter" class="form-control" placeholder="Filter Type" value="{{ request('filter') }}">
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center justify-content-between">
                            Duration
                            <x-sort-button value="duration" />
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center justify-content-between">
                            Distance (Km)
                            <x-sort-button value="distance" />
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center justify-content-between">
                            Pace (Min/Km)
                            <x-sort-button value="pace" />
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center justify-content-between">
                            Date
                            <x-sort-button value="date" />
                        </div>
                    </th>
                    <th scope="col">Actions</th>
                </tr>
            </form>
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
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('editView', $entry->id) }}" class="btn btn-primary">
                            <iconify-icon icon="fa-solid:edit" style="font-size: 14px;"></iconify-icon>
                        </a>
                        <form action="{{ route('deleteEntry', $entry->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this entry?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <iconify-icon icon="fa-solid:trash" style="font-size: 14px;"></iconify-icon>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        {{ $cardioEntries->links() }}
    </div>
</div>
@endsection