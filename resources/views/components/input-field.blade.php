{{-- remember to check App\Http\View\Components\InputField.php for all the available variables --}}
<div class="mb-3">
    @if($title)
    <label for="{{ $id }}" class="form-label">{{ $title }}</label>
    @endif
    <div class="form-group">
        <input 
            type = "{{ $type }}" 
            name = "{{ $name }}" 
            class = "form-style @error($name) error @enderror" 
            id = "{{ $id }}" 
            value = "{{ $value }}"
            autocomplete = "off"
            placeholder = "{{ $placeholder }}">
        @error($name)
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>