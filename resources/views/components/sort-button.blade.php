<button 
type="submit" 
class="btn btn-link d-flex p-0 text-decoration-none"
onclick="document.getElementById('sort').value='{{ $value }}'; document.getElementById('direction').value='{{ request('sort') === $value && request('direction') === 'desc' ? 'asc' : 'desc' }}';">
    <iconify-icon icon="fa-solid:arrow-up" style="font-size: 14px; color: {{ request('sort') === $value && request('direction') === 'asc' ? 'black' : 'gray' }}"></iconify-icon>
    <iconify-icon icon="fa-solid:arrow-down" style="font-size: 14px; color: {{ request('sort') === $value && request('direction') === 'desc' ? 'black' : 'gray' }}"></iconify-icon>
</button>