<div class="form-group">
    <label for="subject">{{$label}}</label>
    <textarea class="form-control" name="{{$field}}" id="{{$field}}" rows="3">
    @isset($value) {{old($field) ? old($field): $value }}
    @else {{old($field)}}
    @endisset

    </textarea>
        @error($field)
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>