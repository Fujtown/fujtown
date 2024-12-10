@extends('layout.admin')
    @section('title', 'Dahboard')
    
    @section('content')
    <div class="page-content-wrapper ">

<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Fujtown</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
                <h4 class="page-title">Categories</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
                                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body bootstrap-select-1">
                            <h4 class="mt-0 header-title">Customer</h4>
                            <p class="text-muted mb-4 font-13">Add Customer. </p>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                            <form action="{{route('coffee.store-customer')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-10">First Name</h6>                                            
                                    <input type="text" name="first_name" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-10">Last Name</h6>                                            
                                    <input type="text"  name="last_name" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-10">User Name</h6>                                            
                                    <input type="text"  name="customer_user_name" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-10">Phone</h6>                                            
                                    <input type="text"  name="customer_phone" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-10">Email</h6>                                            
                                    <input type="text"  name="email" class="form-control" /> 
                                </div>                                    
                               
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-10">New Password</h6>                                            
                                    <input type="text" name="new_password" class="form-control" /> 
                                </div>                                    
                               
                                <div class="col-md-12 ">
                                <div class="form-group mt-30">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                                
                                </div>
                                
                            </div>
                            </form>
                        </div>
                    </div>                                
                                </div> <!-- end col -->
                                       
                            </div> <!-- end row --> 
    
    <!-- end row -->
    
</div><!-- container -->

</div> <!-- Page content Wrapper -->
    @endsection