<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: rgb(13, 131, 23);
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
        <a href="{{route('supervisor.index')}}">Home</a>
        <a href="{{route('supervisor.messages')}}">Messages</a>
        <a href="{{route('supervisor.info')}}">Info</a>

        <div>
            welcome - <b>{{session('fullName')}}</b> 
        </div>
        <a href="{{route('logout.member')}}" class="dropdown-item">Log Out</a>
    </div>
    
    @yield('contents')

</body>
</html>