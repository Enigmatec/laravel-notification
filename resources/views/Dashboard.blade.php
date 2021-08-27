<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body style="background-color:light-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto" style="margin-top:150px">
            @if(Session::has('status'))
            <div class="alert alert-success">
                <p>{{ Session::get('status') }}</p>
            </div>
            @endif
                <div class="card">
                    <div class="card-header">
                        Login as {{  $user->role }}
                        <form action="{{ route('logout') }}" method="post">
                        @csrf
                            <button class="btn btn-danger btn-sm mt-2">LOGOUT</button>
                        </form>
                    </div>
                    <div class="card-body">
                        @if($user->role === 'user')
                            <form action="{{ route('comment') }}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label for="">Comment:</label>
                                    <textarea name="comment" class="form-control" name="" id="" cols="30" rows="5"></textarea>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success mt-3" type="submit">Comment</button>
                                </div>
                            </form>
                        @endif
                        <form action="{{ route('markAllRead') }}" method="get">
                        @if($user->role === 'admin')
                            <span type="submit" class="btn btn-primary btn-sm position-relative">
                            Unread Comments
                                <span id="unRead" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                
                                <span class="visually-hidden">unread messages</span>
                                </span>
                            </span>
                            <br>
                            <button type="submit" class="btn btn-danger mt-2 btn-sm">Mark All as Read</button>
                        </form>
                        <hr style="border_bottom: 2px solid grey">
                        <h5 class="mb-3">All Comment</h5>
                        @foreach(Auth::user()->notifications as $notifications)
                            <h5 style="margin-bottom:-2px">{{ $notifications->data['comment'] }} </h5>
                            <p style="font-style:italic">Comment {{ $notifications->created_at->diffForHumans() }}
                            @php
                            echo $notifications->read_at ? '<span class="btn btn-success btn-sm">Read</span>' : '<span class="btn btn-danger btn-sm">Not Read</span>';
                            @endphp
                            </p>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $.ajax({
            type: 'GET',
            url :  '{{ URL::to('un_read_comment') }}',
            success: function(data){
                $('#unRead').text(data);
                console.log(data);
            }
        });
    });
</script>


</html>