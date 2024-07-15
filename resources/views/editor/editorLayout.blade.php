<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: rgb(161, 191, 255);
        }
        #links {
            display: flex;
            width: 73%;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <div id="links">
        <a href="{{route('editor.index')}}">Home</a>
        @if (\App\Policycheck::pv("messages"))
            <a href="{{route('editor.messages')}}">Messages</a>
        @endif
        @if (\App\Policycheck::pv("info"))
            <a href="{{route('editor.info')}}">Info</a>
        @endif
        

        <a href="{{route('products.index')}}">Products</a>

        <div>
            welcome - <b>{{session('fullName')}}</b> 
        </div>
        <a href="{{route('logout.member')}}" class="dropdown-item">Log Out</a>
    </div>
    
    @yield('contents')

</body>
</html>