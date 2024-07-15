@extends('editor/editorLayout')

@section('contents')
    <h1>
        Products of this Editor
    </h1>

        <h1>
            <b>{{ $product->productName }}</b>
            
            <br>

            $ <small>{{ $product->price }}</small>
            
            
        </h1>
    
@endsection