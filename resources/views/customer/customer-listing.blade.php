@extends('layout.customer')
    @section('title', 'Customer Dashboard')
	
    @section('content')
   <!--************************************
				Main Start
		*************************************-->
		<main id="listar-main" class="listar-main listar-haslayout">
			<!--************************************
					Dashboard Banner Start
			*************************************-->
			<div class="listar-dashboardbanner">
				<ol class="listar-breadcrumb">
					<li><a href="javascript:void(0);">Home</a></li>
					<li class="listar-active">Dashboard</li>
				</ol>
				
			</div>
			<!--************************************
					Dashboard Banner End
			*************************************-->
		
			<!--************************************
					Dashboard Content Start
			*************************************-->
			<div id="listar-content" class="listar-content">
			<table class="table table-bordered">
               <thead>
                <tr>
                    <th>Listing Name</th>
                    <th>Listing Cover</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
               </thead> 
			   <tbody>
				@foreach($listings as $list)
				<tr >
					<td>{{ $list->listing_name}}</td>
					<td><img style="width: 100px;" src="{{ asset('storage/'.$list->listing_cover_image)}}" alt=""></td>
					<td>{{ $list->order->order_total}} AED</td>
					<td><button class="btn btn-info make-payment-btn" id="checkoutButton" data-amount="{{ $list->order->order_total}}" data-package="{{ $list->package->packg_name}}">Make Payment</button> | <a href="#" class="btn btn-danger">Remove</a></td>
				</tr>
				@endforeach
			   </tbody>
            </table>
			</div>
			<!--************************************
						Dashboard Content End
			*************************************-->
		</main>
		<!--************************************
					Main End
		*************************************-->
    @endsection

	@section('customer-script')
	<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.make-payment-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
			
                event.preventDefault(); // Prevent default action if necessary
				let checkoutButton = document.getElementById('checkoutButton');
				checkoutButton.innerText = 'Loading...'; // Change button text
				checkoutButton.disabled = true; // Disable the button
                // Retrieve data attributes from the button
                const amount = button.getAttribute('data-amount');
                const packageName = button.getAttribute('data-package');

                // Send AJAX request
                fetch("{{ route('customer.checkout-listing') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        amount: amount,
                        package_name: packageName
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = data.url; // Redirect to payment URL
                    } else {
                        alert(data.message || 'Failed to initiate payment');
						checkoutButton.innerText = 'Make Payment'; // Reset button text
						checkoutButton.disabled = false; // Re-enable button
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
					checkoutButton.innerText = 'Make Payment'; // Reset button text
						checkoutButton.disabled = false; // Re-enable button
                });
            });
        });
    });
</script>
	@endsection