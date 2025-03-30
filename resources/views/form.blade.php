@extends('layouts.master')

@section('title')
{{ $isEdit ? 'CardiNote - Edit Entry' : 'CardiNote - Create New Entry' }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
@endsection

@section('content')
<div class="card p-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="m-0">{{ $isEdit ? 'Edit Entry' : 'Create New Entry' }}</h3>
        <a href="{{ Route('logView') }}" class="d-flex align-items-center">
            <iconify-icon icon="fa6-solid:xmark" style="font-size: 30px; color: red;"></iconify-icon>
        </a>
    </div>

    <form action="{{ route($isEdit ? 'updateEntry' : 'createEntry', $isEdit ? $cardioEntry->id : '') }}" method="POST">
        @csrf

        @if($isEdit)
            @method('PUT')
        @endif

        <x-date-picker 
        title="Date" 
        name="date" id="date"
        value="{{ $isEdit ? date('d M Y', strtotime($cardioEntry->date)) : '' }}" 
        placeholder="Date"
        highlightToday=true />

        <x-dropdown-input 
        title="Cardio Type" 
        name="type" 
        id="type"
        value="{{ $isEdit ? $cardioEntry->type_id : '' }}" 
        placeholder="Cardio Type"
        :options="$cardioTypes" />

        <label for="duration" class="form-label">Duration (Hour : Min : Sec)</label>
        <div class="d-flex gap-2">
            <?php $formattedDuration = $cardioEntry->formatDuration() ?>
            <x-input-field 
            name="hour" 
            id="hour" 
            value="{{ $isEdit ? $formattedDuration['hours'] : '' }}"
            placeholder="Hour(s)" 
            type="text" />

            <h2>:</h2>
            
            <x-input-field 
            name="minute" 
            id="minute" 
            value="{{ $isEdit ? $formattedDuration['minutes'] : '' }}"
            placeholder="Minute(s)" 
            type="text" />

            <h2>:</h2>

            <x-input-field 
            name="second" 
            id="second" 
            value="{{ $isEdit ? $formattedDuration['seconds'] : '' }}"
            placeholder="Second(s)" 
            type="text" />
            
        </div>
        @error('duration')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <x-input-field 
        title="Distance (Km)" 
        name="distance" 
        id="distance"
        value="{{ $isEdit ? $cardioEntry->distance : '' }}" 
        placeholder="Distance" 
        type="text" />

        <button class="btn btn-primary" type="submit">
            {{ $isEdit ? 'Update' : 'Create' }}
        </button>
    </form>
</div>
@endsection