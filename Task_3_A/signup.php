<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .form-step {
      display: none;
    }
    .form-step.active {
      display: block;
    }
    .full-height {
      height: 100vh;
    }
  </style>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center full-height">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-body">
              <h3 class="text-center">Sign Up</h3>
              <div class="progress mb-3">
                <div class="progress-bar" id="progress-bar" style="width: 33%"></div>
              </div>
              <form id="signup-form">
                <div class="form-step active" id="step-1">
                  <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name"  placeholder="Full Name"  name="full_name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                  </div>
                  <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                </div>
                <div class="form-step" id="step-2">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="********" name="password" required>
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="********" name="confirm_password" required>
                  </div>
                  <button type="button" class="btn btn-secondary" onclick="prevStep()">Back</button>
                  <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                </div>
                <div class="form-step" id="step-3">
                  <p class="text-center">Thank you for signing up! You can now submit your form.</p>
                  <button type="submit" class="btn btn-success btn-block">Submit</button>
                </div>
              </form>
              <div class="mt-3 text-center">
                <a href="login.php" class="btn btn-link">Already have an account? Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    let currentStep = 1;
    const totalSteps = 3;

    function nextStep() {
      if (currentStep < totalSteps) {
        currentStep++;
        updateForm();
      }
    }

    function prevStep() {
      if (currentStep > 1) {
        currentStep--;
        updateForm();
      }
    }

    function updateForm() {
      for (let i = 1; i <= totalSteps; i++) {
        const step = document.getElementById('step-' + i);
        if (i === currentStep) {
          step.classList.add('active');
        } else {
          step.classList.remove('active');
        }
      }
      const progress = (currentStep / totalSteps) * 100;
      document.getElementById('progress-bar').style.width = progress + '%';
    }
  </script>
</body>
</html>
