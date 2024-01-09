<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Registration Form</title>
</head>
<body>
  <div class="container-fluid d-flex justify-content-center align-items-center " style="height: 100vh;background: #F0F8FF">
    <div class=" text-center shadow" style="width: 35%">
        <form class="form-control " action="{{route('register')}}" method="POST" style="background: white">
            @csrf
        <div class="fs-1 text-primary mb-4">Doctor<span class="fw-bold">Aid</span></div>
            
            <div class="mb-3">
              <label for="username" class="form-label">Name</label>
              <input type="text" class="form-control" id="username" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- Submit button -->
            <div class="d-grid d-flex justify-content-md-center mb-4">
              <button type="submit" class="btn btn-primary w-25 mb-2">Register</button>
            </div>
          </form>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
{{-- <form>
    <!-- Username field -->
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <!-- Email field -->
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <!-- Password field -->
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <!-- Submit button -->
    <div class="d-grid">
      <button type="submit" class="btn btn-primary">Register</button>
    </div>
  </form> --}}
