<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>
<body style="background-color:light-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-4  mx-auto" style="margin-top:150px">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="">Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Johndoe@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary mt-3" type="submit">LET ME IN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>