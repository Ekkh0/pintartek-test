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
        <a href="{{ URL::previous() }}" class="d-flex align-items-center">
            <iconify-icon icon="fa6-solid:xmark" style="font-size: 30px; color: red;"></iconify-icon>
        </a>
    </div>

    <form action="{{ route($isEdit ? 'createEntry' : 'updateEntry', $isEdit ? $cardioEntry->id : '') }}" method="POST">
        @csrf
        {{ $isEdit ? method_field('PUT') : '' }}

        <x-date-picker 
        title="Date" 
        name="date" id="date"
        value="{{ $isEdit ? date('d M Y', strtotime($cardioEntry->date)) : '' }}" 
        placeholder="Date"
        highlightToday=true />

        <x-dropdown-input 
        title="Cardio Type" 
        name="type" id="type"
        value="{{ $isEdit ? $cardioEntry->type_id : '' }}" 
        placeholder="Cardio Type"
        :options="$cardioTypes" />

        <label for="duration" class="form-label">Duration</label>
        <div class="d-flex gap-2">

            <x-input-field 
            name="Minute" 
            id="minute" 
            value="{{ $isEdit ? $cardioEntry->duration : '' }}"
            placeholder="Minute(s)" 
            type="text" />

            <h2>:</h2>

            <x-input-field 
            name="Second" 
            id="second" 
            value="{{ $isEdit ? $cardioEntry->duration : '' }}"
            placeholder="Second(s)" 
            type="text" />
            
        </div>
        <x-input-field title="Distance (Km)" name="Distance" id="distance"
            value="{{ $isEdit ? $cardioEntry->distance : '' }}" placeholder="Distance" type="text" />
    </form>
</div>
@endsection