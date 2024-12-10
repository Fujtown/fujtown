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
                            <h4 class="mt-0 header-title">Category</h4>
                            <p class="text-muted mb-4 font-13">Add Category. </p>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                            <form action="{{route('coffee.add-category')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-0">Name</h6>                                            
                                    <input type="text" name="category_name" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-0">Name Arabic</h6>                                            
                                    <input type="text" name="category_name_arabic" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-6 mt-10">
                                    <h6 class=" input-title mb-2 mt-0">Custom URL</h6>                                            
                                    <input type="text" name="url" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-6 mt-10">
                                    <h6 class=" input-title mb-2 mt-0">Select Parent Category</h6>                                            
                                    <select name="category_parent_id" class="form-control" id="">
                                        <option value="">Select Parent Category</option>
                                        @foreach($pcategories as $pcat)
                                        <option value="{{$pcat->id}}">{{$pcat->parent_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>                                    
                                <div class="col-md-6 mt-10">
                                    <h6 class=" input-title mb-2 mt-2 mt-lg-0">Category Image</h6>                                            
                                    <input type="file" name="category_image" class="form-control" />
                                </div>                                 
                                <div class="col-md-6 mt-10">
                                    <h6 class=" input-title mb-2 mt-0">Category Status</h6>                                            
                                    <select name="category_status" class="form-control" id="">
                                        <option value="1">Active</option>
                                        <option value="0">Disable</option>
                                    </select>
                                </div>                                    
                               
                                <div class="col-md-12 mt-10">
                                    <h6 class=" input-title mb-2 mt-2 mt-lg-0">Description</h6>                                            
                                    <textarea name="category_description" class="form-control" rows="4"  id="wysiwyg"></textarea>
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