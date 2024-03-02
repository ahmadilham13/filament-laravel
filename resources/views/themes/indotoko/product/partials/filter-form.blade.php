<div>
    <form action="{{ route('product.index') }}" method="GET" class="d-flex gap-2">
        @csrf
        <select name="sortBy" class="form-select">
            @foreach ($sortChoices as $key => $value)
                <option value="{{ $key }}" @if ($sortBy == $key) selected @endif>{{ $value }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn-first-sm">Filter</button>
    </form>
</div>