<option value="">select</option>
@foreach ($datas as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
@endforeach