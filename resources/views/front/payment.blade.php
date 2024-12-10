@extends('layout.app')
    @section('title', 'Home Page')

    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/payment.css') }}">
@endsection

    @section('content')
   
    <main class="main">
    <section class="section banner-contact">
        <div class="container">
          <div class="banner-1">
            <div class="row align-items-center">
              <!-- <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span> -->
                <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn page-title" data-wow-delay=".2s">
                Payment
                </h1>
              </div>
            
            </div>
          </div>
        </div>
      </section>
      <section class="section mt-50">
    <div class="container">
        <div class="row mt-50">
            <div class="col-md-3"></div>   
            <div class="col-md-6 how-section">
            <table id="payment-table" class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
        <th colspan="2" class="payment-head">Package Details</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$packageNameSel}}</td>
            <td>{{$packagePrice}} AED</td>
        </tr>
    </tbody>
</table>
   
            <form id="paymentForm" action="{{route('customer.checkout-listing')}}" method="POST">
                @csrf
                <h4 class="text-center">Select Payment to Publish Listing</h4>
                
                <div class="payment-options mt-4 d-flex justify-content-center">
                    <!-- PayPal Payment Option Card -->
                    <label class="payment-card">
                        <input type="radio" name="payment_gateway" value="paypal" />
                        <div class="card-content">
                            <span>Paypal</span>
                            <img src="{{asset('assets/imgs/page/homepage3/paypal.png')}}" alt="PayPal Logo" class="payment-logo">
                            <span class="radio-circle"></span>
                        </div>
                    </label>

                 
                    <!-- Bank Transfer Payment Option Card (Visa/MasterCard) -->
                    <label class="payment-card">
                        <input type="radio" name="payment_gateway" value="bank" />
                        <div class="card-content">
                            <span>Bank Transfer</span>
                            <div class="payment-logo-group">
                                <img src="{{asset('assets/imgs/page/homepage3/payment-method.png')}}" alt="Visa Logo" class="payment-logo">
                            </div>
                            <span class="radio-circle"></span>
                        </div>
                    </label>

                   
                </div>

                <!-- Checkout Button -->
                <div class="text-center mt-4">
                <button type="button" class="btn btn-primary btn-lg" id="checkoutButton">Checkout</button>

                </div>
                </form>   
            </div>
            <div class="col-md-3"></div>   
        </div>
    </div>
</section>



    </main>

  @endsection
@section('script')
<script>
    // alert()
    document.getElementById('checkoutButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission
        let checkoutButton = document.getElementById('checkoutButton');
        checkoutButton.innerText = 'Loading...'; // Change button text
        checkoutButton.disabled = true; // Disable the button
        let formData = new FormData(document.getElementById('paymentForm')); // Capture form data
        
        fetch("{{ route('customer.checkout-listing') }}", {
            method: "POST",
            headers: {
                "X-CSRF-Token": "{{ csrf_token() }}"
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to payment URL or show success message
                window.location.href = data.url;
            } else {
                alert(data.message || 'Failed to initiate payment');
                checkoutButton.innerText = 'Checkout'; // Reset button text
                checkoutButton.disabled = false; // Re-enable button
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });
</script>
@endsection