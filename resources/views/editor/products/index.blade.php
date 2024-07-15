@extends('editor/editorLayout')

@section('contents')
    <h1>
        Products of this Editor
    </h1>

    @foreach ($products as $item)
        <h1>
            <b>{{ $item->productName }}</b> - 
            $ <small>{{ $item->price }}</small>
            ---- 
            <a href="{{ route('products.show', $item->id) }}">Show</a>
        </h1>
    @endforeach
@endsection