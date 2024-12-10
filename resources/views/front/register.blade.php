@extends('layout.app')
    @section('title', 'Home Page')

    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/captcha/slidercaptcha.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toast.css') }}">

@endsection

    @section('content')
   
    <main class="main">
    <div class="container">
            <div class="row align-items-center">
            <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="box-register">
                  <h2 class="color-brand-1 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s"> Create an account</h2>
                  <p class="font-md color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s"> Create an account today and start using our business directory.</p>
                  <div class="line-register mt-25 mb-50"></div>
                  <form id="registrationForm" action="">
                  <div class="row wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                  
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-name" name="first_name" id="firstname" type="text" placeholder="First name">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-name" type="text" id="lastname" name="last_name" placeholder="Last name">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group mb-25">
                      <input class="form-control icon-name" type="text" name="customer_user_name"  id="username" placeholder="User name">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group mb-25">
                      <input class="form-control icon-phone" type="text" id="phone" name="customer_phone" placeholder="Phone">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-email" type="text" name="email" id="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-email" type="text" id="confirm_email" name="confirm_email" placeholder="Confirm Email">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-password" type="password" name="customer_password" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-password" type="password" name="confirm_password" placeholder="Re-password">
                    </div>
                  </div>
                 
                  <div class="col-lg-12 col-sm-12">
                  <div class="slidercaptcha card">
                    <div class="card-header">
                        <span>Drag To Verify</span>
                    </div>
                    <div class="card-body">
                        <div id="captcha"></div>
                    </div>
                    </div>
                  </div>
                 
                  
                  <div class="col-lg-12 mt-15">
                    <div class="form-group mb-25">
                      <label class="cb-container">
                        <input type="checkbox" name="terms_accepted"><span class="text-small">I have read and agree to the Terms & Conditions and the Privacy Policy of this website.</span><span class="checkmark"></span> : <span><a target="_blank" href="{{route('terms-and-conditions')}}">Terms & Conditions</a></span>
                      </label>
                    </div>
                   
                  </div>

                </div>
                </form>
                <div class="row align-items-center mt-30 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-6">
                    <div class="form-group">
                    <button id="signupButton" disabled class="btn btn-brand-lg btn-full font-md-bold" type="button">Sign up now</button>

                    </div>
                  </div>
                  <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 col-6"><span class="d-inline-block align-middle font-sm color-grey-500">Already have an account?</span><a class="d-inline-block align-middle color-success ml-3" href="{{route('login')}}"> Sign In</a></div>
                </div>
                </div>
              </div>
              <div class="col-md-2"></div>
            </div>
          </div>
    </main>

  @endsection
  @section('script') 
  <script type="text/javascript" src="{{asset('assets/captcha/longbow.slidercaptcha.min.js')}}"></script>
  <script src="{{ asset('assets/js/toast.js') }}"></script>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var captcha = sliderCaptcha({
        id: 'captcha',
        onSuccess: function () {
            // Captcha successful, now validate and submit the form
            document.getElementById('signupButton').removeAttribute('disabled')
        }
    });

    
// Add event listener to the button
document.getElementById('signupButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default form submission
    if (validateForm()) {
        submitForm();
    }
});

    function validateForm() {
      var form = document.getElementById('registrationForm');

        console.log(form)
        var isValid = true;

        // Reset previous errors
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

        // Validate First Name
        var firstName = form.querySelector('[name="first_name"]');
      
        if (!firstName.value.trim()) {
            showFieldError(firstName, 'First name is required');
            isValid = false;
        }

        // Validate Last Name
        var lastName = form.querySelector('[name="last_name"]');
        if (!lastName.value.trim()) {
            showFieldError(lastName, 'Last name is required');
            isValid = false;
        }

        // Validate Username
        var username = form.querySelector('[name="customer_user_name"]');
        if (!username.value.trim()) {
            showFieldError(username, 'Username is required');
            isValid = false;
        } else if (username.value.length < 3) {
            showFieldError(username, 'Username must be at least 3 characters long');
            isValid = false;
        }

        // Validate Phone
        var phone = form.querySelector('[name="customer_phone"]');
        if (!phone.value.trim()) {
            showFieldError(phone, 'Phone number is required');
            isValid = false;
        } else if (!/^\d{10}$/.test(phone.value)) {
            showFieldError(phone, 'Please enter a valid 10-digit phone number');
            isValid = false;
        }

        // Validate Email
        var email = form.querySelector('[name="email"]');
        var confirm_email = form.querySelector('[name="confirm_email"]');
        if (!email.value.trim()) {
            showFieldError(email, 'Email is required');
            isValid = false;
        } else if (!/\S+@\S+\.\S+/.test(email.value)) {
            showFieldError(email, 'Please enter a valid email address');
            isValid = false;
        }
        if (email.value.trim() !=confirm_email.value.trim()) {
            showFieldError(confirm_email, 'Email & Confirm Email does not matched');
            isValid = false;
        }

        // Validate Password
        var password = form.querySelector('[name="customer_password"]');
        if (!password.value) {
            showFieldError(password, 'Password is required');
            isValid = false;
        } else if (password.value.length < 8) {
            showFieldError(password, 'Password must be at least 8 characters long');
            isValid = false;
        }
       
        // Confirm Password
        var password = form.querySelector('[name="customer_password"]');
        var confirm_password = form.querySelector('[name="confirm_password"]');
        if (password.value !=confirm_password.value) {
            showFieldError(confirm_password, 'Password and Confirm password does not matched');
            isValid = false;
        } 

        // Validate Terms Acceptance
        var termsAccepted = form.querySelector('[name="terms_accepted"]');
        if (!termsAccepted.checked) {
            showFieldError(termsAccepted, 'You must accept the terms and conditions');
            isValid = false;
        }

        return isValid;
    }

    function submitForm() {
                var form = document.getElementById('registrationForm');
                var formData = new FormData(form);

                fetch('/register_user', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        showToast(data.message, 'success');
                        setTimeout(() => {
                            window.location.href = '/login'; // Redirect to login page
                        }, 3000);
                    } else {
                        showToast('Registration failed. Please try again.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred. Please try again.', 'error');
                });
            }

    function showMessage(message, type) {
        var alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type}`;
        alertDiv.textContent = message;
        document.querySelector('form').prepend(alertDiv);
        setTimeout(() => alertDiv.remove(), 5000);
    }

    function showFieldError(field, message) {
        field.classList.add('is-invalid');
        var errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
    }

    // Reset form errors on input
    document.querySelectorAll('form input').forEach(input => {
        input.addEventListener('input', function() {
            this.classList.remove('is-invalid');
            var errorDiv = this.parentNode.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.remove();
        });
    });
});

  </script>
@endsection