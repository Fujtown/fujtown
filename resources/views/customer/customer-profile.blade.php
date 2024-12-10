@extends('layout.customer')
    @section('title', 'Customer Dashboard')
    @section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/customer/customer-profile.css') }}">
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
				<form class="listar-formtheme listar-formaddlisting">
					<fieldset>
						<div class="listar-boxtitle">
							<h3>My Profile</h3>
						</div>
						<div class="listar-dashboardmyprofile">
                        <figure class="listare-profilepic">
                        <img src="{{  asset('assets/customer/img/profile.png') }}" alt="Profile Image" id="profile-image-preview">
                        <figcaption>
                            <label for="profile-image-upload" class="listar-btnuploadimg">
                                <i class="icon-upload2"></i>Upload Images
                            </label>
                            <input type="file" id="profile-image-upload" style="display: none" accept="image/*" onchange="uploadProfileImage(this)">
                        </figcaption>
                    </figure>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group listar-dashboardfield">
										<label>Your Name</label>
										<input type="text" name="name" class="form-control" placeholder="John parker">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group listar-dashboardfield">
										<label>Email Address</label>
										<input type="email" name="email" class="form-control" placeholder="listingstar@gmail.com">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group listar-dashboardfield">
										<label>Phone Number</label>
										<input type="text" name="phonenumber" class="form-control" placeholder="013214577">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="listar-select listar-dashboardfield">
                                <label>Gender</label>
												<select>
													<option>Select Gender</option>
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group listar-dashboardfield">
										<label>Website</label>
										<input type="url" name="yoururl" class="form-control" placeholder="www.yoursite.com">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label>&nbsp;</label>
									<input type="submit" value="Update" class="btn btn-info">
								</div>
								
							</div>
						</div>
					</fieldset>
				
					<fieldset>
						<div class="listar-boxtitle">
							<h3>Update Password</h3>
						</div>
						<div class="listar-dashboardpassword">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group listar-dashboardfield">
										<label>New Password</label>
										<input type="password" name="password" class="form-control" placeholder="your new password">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group listar-dashboardfield">
										<label>Repeat Password</label>
										<input type="password" name="password" class="form-control" placeholder="write again your new password">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<span>Enter same password in both fields Use an uppercase letter and a number for stronger password.</span>
									<a class="listar-btn listar-btngreen" href="javascript:void(0);">Update Password</a>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<!--************************************
						Dashboard Content End
			*************************************-->
		</main>
		<!--************************************
					Main End
		*************************************-->
    @endsection
    @push('scripts')
<script>
function uploadProfileImage(input) {
    if (input.files && input.files[0]) {
        const formData = new FormData();
        formData.append('profile_image', input.files[0]);
        
        // Show preview
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-image-preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);

        // Upload image
        fetch('/customer/upload-profile-image', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                alert('Profile image uploaded successfully');
            } else {
                alert('Error uploading image');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error uploading image');
        });
    }
}
</script>
@endpush