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
          <h5 class="text-center">Student Session</h5>
        </div>
        <div class="card-body">
         <form action="{{ route('student-session.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter student name">
            </div>
      
            <div class="mb-3">
                <label class="form-label">Hobbies</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkbox1" value="Swimming"
                        name="hobbies[]">
                    <label for="checkbox1">Swimming</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkbox2" value="Walking"
                        name="hobbies[]">
                    <label for="checkbox2">Walking</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkbox3" value="Traveling"
                        name="hobbies[]">
                    <label for="checkbox3">Traveling</label>
                </div>
            </div>
            <div class="mb-3">
                <label>Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="radio1" value="Male">
                    <label for="radio1">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="radio2" value="Female">
                    <label for="radio2">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="favourite">Favourite</label>
                <select class="selectpicker" multiple data-live-search="true" name="favourite[]">
                    <option value="Dancing">Dancing</option>
                    <option value="Singing">Singing</option>
                    <option value="Watching Movie">Watching Movie</option>
                    <option value="Playing">Playing</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="maritalStatus">Matrial Status</label>
                <select class="custom-select" id="maritalStatus" name="maritalStatus">
                  <option value="">Choose your status</option>
                  <option value="Single">Single</option>
                  <option value="Marriage">Marriage</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
