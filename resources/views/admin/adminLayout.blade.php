<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: pink;
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
        <a href="{{route('admin.index')}}">Home</a>
        <a href="{{route('admin.messages')}}">Messages</a>
        <a href="{{route('admin.info')}}">Info</a>

        <div>
            welcome - <b>{{session('fullName')}}</b> 
        </div>

        <a href="{{route('logout.member')}}" class="dropdown-item">Log Out</a>
    </div>
    
    @yield('contents')

</body>
</html>