{{-- remember to check App\Http\View\Components\DropdownInput.php for all the available variables and notes on how to use the component --}}
<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $title }}</label>
    <div class="input-group">
        <select id="{{ $id }}" name="{{ $name }}" class="form-style @error($name) error @enderror">
            <option value="" disabled selected>{{ $placeholder }}</option>

            @foreach ($options as $optionValue => $label)
                <option value="{{ $optionValue }}" {{ $value == $optionValue ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>

    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>