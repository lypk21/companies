<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{config('app.name')}} Admin Platform
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>

<body>
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-sm-2">
            <ul>
                <li>
                    <a href="{{url('admin/company')}}">Company</a>
                </li>
                <li>
                    <a href="{{url('admin/employee')}}">
                        Employee
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-sm-10">
            @yield('content')
        </div>
    </div>
</div>

</body>
