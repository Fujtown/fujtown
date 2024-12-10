@extends('layout.admin')
    @section('title', 'Dahboard')
    @section('additional_css')
    <link href="{{asset('assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    @endsection
    @section('content')
    
    <div class="page-content-wrapper ">

<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Fujtown</a></li>
                        <li class="breadcrumb-item active">Trips & Tours</li>
                    </ol>
                </div>
                <h4 class="page-title">Trips & Tours</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body bootstrap-select-1">
                            <h4 class="mt-0 header-title">Trips & Tours</h4>
                            <p class="text-muted mb-4 font-13">Add Trips & Tours. </p>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{route('coffee.store-event')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-0">Title</h6>                                            
                                    <input type="text" name="trip_title" value="{{ old('trip_title') }}" class="form-control" /> 
                                    @error('trip_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>                                    
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Price</h6>                                            
                                    <input type="text" name="trip_price" id="keywords" value="{{ old('trip_price') }}" class="form-control" /> 
                                    @error('trip_price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>   
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-10">Start Date</h6>                                            
                                    <input type="text" name="trip_date" class="form-control" value="{{ old('trip_date') }}" placeholder="2017-06-04" id="mdate">
                                    @error('trip_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>   
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-10">End Date</h6>                                            
                                    <input type="text" name="end_date" class="form-control" value="{{ old('end_date') }}" placeholder="2017-06-04" id="mdate1">
                                    @error('end_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>   
                                                         
                                <div class="col-md-12">
                                <label class="container-checkbox">: Upcoming Event
                                <input name="trip_upcoming" type="checkbox" {{ old('trip_upcoming') ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                </label> 
                                </div>   
                                                         
                                
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Type</h6>                                            
                                    <select name="trip_type" class="form-control">
                                    <option value="Trip &amp; Tour" {{ old('trip_type') == 'Trip & Tour' ? 'selected' : '' }}>Trip & Tour</option>
                                    <option value="edu" {{ old('trip_type') == 'edu' ? 'selected' : '' }}>Educational</option>
                                    <option value="cor" {{ old('trip_type') == 'cor' ? 'selected' : '' }}>Corporate</option>
                                    <option value="Event" {{ old('trip_type') == 'Event' ? 'selected' : '' }}>Event</option>
                                    <option value="Past" {{ old('trip_type') == 'Past' ? 'selected' : '' }}>Past Event</option>
                                </select>
                                @error('trip_type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div> 

                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Status</h6>                                            
                                    <select name="trip_status" class="form-control">
                                    <option value="Paid" {{ old('trip_status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="Free" {{ old('trip_status') == 'Free' ? 'selected' : '' }}>Free</option>
                                    <option value="quote" {{ old('trip_status') == 'quote' ? 'selected' : '' }}>Quote Needed</option>
                                </select>
                                @error('trip_status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div> 

                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Image</h6>                                            
                                    <input type="file" name="trip_image"  class="form-control" /> 
                                    @error('trip_image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                                </div>

                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Description </h6>                                            
                                    <textarea id="elm1" name="trip_description">{{ old('trip_description') }}</textarea>
                                    @error('trip_description')
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
    <script src="{{asset('assets/admin/plugins/timepicker/moment.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js')}}"></script>
     <!--Wysiwig js-->
     <script src="{{asset('assets/admin/plugins/tinymce/tinymce.min.js')}}"></script>
     <script src="{{asset('assets/admin/pages/form-editor.js')}}"></script>
    <script>
   $(document).ready(function(){
        $('#mdate').bootstrapMaterialDatePicker({
            weekStart : 0, time: false 
           });
        $('#mdate1').bootstrapMaterialDatePicker({
            weekStart : 0, time: false 
           });
});
  </script>
    @endsection