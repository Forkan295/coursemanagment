@foreach ($attributes as $item)
<option value="{{ $item->id }}">{{ $item->attribute }}</option>   
@endforeach