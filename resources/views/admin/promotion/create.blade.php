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
                        <li class="breadcrumb-item active">Advertisement</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Advertisement</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body bootstrap-select-1">
                            <h4 class="mt-0 header-title">Advertisement</h4>
                            <p class="text-muted mb-4 font-13">Add Advertisement. </p>
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{route('coffee.store-promotion')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-0">Title</h6>                                            
                                    <input type="text" name="title" class="form-control" /> 
                                    @error('ad_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                                </div>                                    
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Price</h6>                                            
                                    <input type="text" name="ad_name" class="form-control" /> 
                                    @error('ad_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                                </div>                                    
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Sort Order</h6>                                            
                                    <input type="text" name="ad_order" id="keywords" class="form-control" /> 
                                
                                @error('ad_order')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>   
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Number of days:</h6>                                            
                                    <input type="text" name="ad_order" id="keywords" class="form-control" /> 
                                
                                @error('ad_order')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>   
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Purchased Counter:</h6>                                            
                                    <input type="text" name="ad_order" id="keywords" class="form-control" /> 
                                
                                @error('ad_order')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>   
                                
                              
                              
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Image</h6>                                            
                                    <input type="file" name="ad_image"  class="form-control" /> 
                                    @error('ad_image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>

                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Description </h6>                                            
                                    <textarea id="elm1" name="ad_description"></textarea>
                                    @error('ad_description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
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
                                <div class="col-lg-1"></div>                     
                            </div> <!-- end row --> 
    
    <!-- end row -->
    
</div><!-- container -->

</div> <!-- Page content Wrapper -->
    @endsection
    @section('admin-script')
     <!--Wysiwig js-->
     <script src="{{asset('assets/admin/plugins/tinymce/tinymce.min.js')}}"></script>
     <script src="{{asset('assets/admin/pages/form-editor.js')}}"></script>
    
    @endsection