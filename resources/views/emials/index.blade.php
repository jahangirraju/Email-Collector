<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emails Collector</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="text-center text">
            Email Collector
        </div>
        <div class="row g-0 text-center section">
            <div class="col-sm-6 col-md-8 ">
                <form action="{{ route('emails.store') }}" method="POST" class="card card-body p-4 mx-4">
                    @csrf
                    <textarea name="emails" rows="10" cols="90" placeholder="Enter emails by comma separated"></textarea>
                    <br />
                    <br />
                    <button type="submit" class="submit btn btn-success">Submit</button>
                </form>
            </div>
            <div class="col-6 col-md-4 card card-body p-4">
                <h2>Email list</h2>
                <form class="" action="">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ request()->search }}" class="form-control"
                            placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <ol>
                    @foreach ($emails as $email)
                        <li> {{ $email->email }} </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</body>

</html>
