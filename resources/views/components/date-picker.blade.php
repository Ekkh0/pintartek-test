<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>

<body>
    <div class="mb-3">
        <label for="{{ $id }}" class="form-label">{{ $title }}</label>
        <div class="input-group date">
            <input type="text" 
            id="datepicker" 
            name="{{ $name }}" 
            value="{{ $value }}" 
            class="form-style @error($name) error @enderror"
            readonly="true"
            placeholder="{{ $placeholder }}"/>
        </div>

        @error($name)
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</body>

<script type="text/javascript">
    $(function() {
        $('#datepicker').datepicker({
            format: "dd M yyyy",
            orientation: "bottom",
            autoclose: true,
            todayHighlight: {{ $todayHighlight ?? 'true' }}
        });
    });
</script>
</html>