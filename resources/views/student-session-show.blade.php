<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <title>Laravel Session Tutorial</title>
</head>

<body>

    <div class="container mt-5">
        <div class="card col-md-8">
            <div class="card-header">
                <h5 class="text-center">Student Details</h5>
                <a href="{{ route('student-session.get') }}" class="btn btn-outline-secondary float-right">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Hobbies</th>
                                            <th>Gender</th>
                                            <th>Favourite</th>
                                            <th>Matrial Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $name }}</td>
                                            <td>
                                                @foreach (Session::get('hobbies') as $hobbie)
                                                    {{ $hobbie }}
                                                    <br>
                                                @endforeach
                                            </td>
                                            <td>{{ $gender }}</td>
                                            <td>
                                                @foreach (Session::get('favourite') as $favourites)
                                                    {{ $favourites }} <br>
                                                @endforeach
                                            </td>
                                            <td> {{ $maritalStatus }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
