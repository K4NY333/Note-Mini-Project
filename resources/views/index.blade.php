<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <title>Sign In / Sign Up</title>
  @vite('resources/css/login.css')
</head>

<body>
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        <!-- SIGN IN FORM -->
        <form action="{{ route('login.submit') }}" id="SignInForm" class="form-transition" method="POST">
          @csrf

          <!-- Email / Username input -->
          <div data-mdb-input-init class="form-outline mb-4">
              <input type="text" name="email" id="form3Example3" class="form-control form-control-lg"
                  placeholder="Enter a valid email address" />
              <label class="form-label" for="form3Example3">Email Address</label>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
              <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                  placeholder="Enter password" />
              <label class="form-label" for="form3Example4">Password</label>
          </div>  

          <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? 
                  <a href="#!" class="link-danger" onclick="showSignUp(event)">Register</a>
              </p>
          </div>
      </form>

        <!-- SIGN UP FORM -->
      <form action="{{ route('register.submit') }}" id="SignUpForm" class="form-transition" style="display: none;" method="POST">
          @csrf

          <!-- Username input -->
          <div data-mdb-input-init class="form-outline mb-3">
              <input type="text" name="username" id="form3Example5" class="form-control form-control-lg"
                  placeholder="Enter username" />
              <label class="form-label" for="form3Example5">Username</label>
          </div>

          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" name="email" id="form3Example6" class="form-control form-control-lg"
                  placeholder="Enter a valid email address" />
              <label class="form-label" for="form3Example6">Email address</label>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
              <input type="password" name="password" id="form3Example7" class="form-control form-control-lg"
                  placeholder="Enter password" />
              <label class="form-label" for="form3Example7">Password</label>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? 
                  <a href="#!" class="link-danger" onclick="showSignIn(event)">Sign In</a>
              </p>
          </div>
      </form>

      </div>
    </div>
  </div>
</section>
</body>
</html>

<script>
  // Function for showing/hiding form
  function showSignUp(event) {
    event.preventDefault();
    
    const signInForm = document.getElementById('SignInForm');
    const signUpForm = document.getElementById('SignUpForm');
    
    // Hide Sign In form
    signInForm.style.display = 'none';
    
    // Show Sign Up form
    signUpForm.style.display = 'block';
  }

  // Function for showing/hiding form
  function showSignIn(event) {
    event.preventDefault();
    
    const signInForm = document.getElementById('SignInForm');
    const signUpForm = document.getElementById('SignUpForm');
    
    //Hide Sign Up form
    signUpForm.style.display = 'none';
    
    //Show Sign In form
    signInForm.style.display = 'block';
  }

  //Toggle function
  function toggleForms(event) {
    if (event) event.preventDefault();
    
    const signInForm = document.getElementById('SignInForm');
    const signUpForm = document.getElementById('SignUpForm');
    
    //Toggle visibility
    if (signInForm.style.display !== 'none') {
      signInForm.style.display = 'none';
      signUpForm.style.display = 'block';
    } else {
      signInForm.style.display = 'block';
      signUpForm.style.display = 'none';
    }
  }
</script>