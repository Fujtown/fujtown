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
                        <li class="breadcrumb-item active">Blogs</li>
                    </ol>
                </div>
                <h4 class="page-title">Blog</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body bootstrap-select-1">
                            <h4 class="mt-0 header-title">Blog</h4>
                            <p class="text-muted mb-4 font-13">Add Blog. </p>
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

                        <form action="{{route('coffee.store-job')}}" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-0">Title</h6>                                            
                                    <input type="text"  value="{{ old('job_title') }}"  name="job_title" class="form-control" /> 
                                    @error('job_title')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>                    
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-0">Company</h6>                                            
                                    <input type="text"  value="{{ old('company') }}"  name="company" class="form-control" /> 
                                    @error('company')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                                 @enderror
                                </div>                    
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Tags</h6>                                            
                                    <input type="text" name="job_tags" id="tags" class="form-control" /> 
                                </div>   
                                <div id="tag-tags" class="mt-2"></div>
                                <input type="hidden" id="tag-hidden" name="tags" />                                 

                                <div class="col-md-12 mt-10">
                                    <div class="row">
                                        <div class="col-md-5">
                                        <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-0">Salary Range From </h6>                                            
                                    <input type="text" name="salary_from" value="{{ old('salary_from') }}"  class="form-control" /> 
                                    @error('salary_from')
                                    <div class="invalid-feedback" style="color: red;">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>    
                                        </div>
                                        <div class="col-md-5">
                                             <h6 class=" input-title mb-2 mt-0">Salary Range To </h6>                                            
                                        <input type="text"  value="{{ old('salary_to') }}"  name="salary_to" class="form-control" /> 
                                        @error('salary_to')
                <div class="invalid-feedback" style="color: red;">
                    {{ $message }}
                </div>
            @enderror
                                    </div>
                                        <div class="col-md-2">
                                        <h6 class=" input-title mb-2 mt-0" style="text-align: center;">OR Confidential </h6>                                            
                                        <input type="checkbox" name="confidential"  class="form-control" />
                                     </div>
                                        </div>
                                    </div>

                                <div class="col-md-12 mt-10">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-0">Experience </h6>                                            
                                    <input type="text" name="experience" value="{{ old('experience') }}"  class="form-control" /> 
                                    @error('experience')
                                    <div class="invalid-feedback" style="color: red;">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>    
                                        </div>
                                        <div class="col-md-4">
                                             <h6 class=" input-title mb-2 mt-0">Gender </h6>                                            
                                        <select name="gender" class="form-control" id="">
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                        <div class="col-md-4">
                                        <h6 class=" input-title mb-2 mt-0" >Education </h6>     
                                        <input type="text" name="education" value="{{ old('education') }}"  class="form-control" /> 
                                    @error('education')
                                    <div class="invalid-feedback" style="color: red;">
                                        {{ $message }}
                                    </div>
                                @enderror
                                     </div>
                                        </div>
                                    </div>
                                      
                                    <div class="col-md-12 mt-10">
                                    <h6 class=" input-title mb-2 mt-0">Location</h6>                                            
                                    <input type="text" name="location" class="form-control" value="{{ old('location') }}"  /> 
                                    @error('location')
                                        <div class="invalid-feedback" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>  
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Job Category</h6>                                            
                                    <select class="form-control" name="job_category" id="">
                                       <option value="">Select Job Category</option> 
                                       @foreach($jobcats as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                       @endforeach
                                    </select>
                                </div> 

                               
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Description </h6>                                            
                                    <textarea id="elm1" name="description"></textarea>
                                                @error('confidential')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
                                </div>

                                <div class="col-md-12 mt-10">
                                    <h6 class=" input-title mb-2 mt-0">URL</h6>                                            
                                    <input type="text" name="job_url" class="form-control" value="{{ old('job_url') }}"  /> 
                                    @error('job_url')
                                        <div class="invalid-feedback" style="color: red;">
                                            {{ $message }}
                                        </div>
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
    <script>


document.addEventListener('DOMContentLoaded', function() {
    const tagInput = document.getElementById('tags');
    const tagTags = document.getElementById('tag-tags');
    const hiddenInput = document.getElementById('tag-hidden');
    // let tags = [];
    let tags = hiddenInput.value ? hiddenInput.value.split(',') : [];


    tagInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ',' || e.key === 'Tab') {
            e.preventDefault();
            addtag();
        }
    });

    
    function addtag() {
        const tag = tagInput.value.trim();
        if (tag && !tags.includes(tag)) {
            tags.push(tag);
            rendertags();
            tagInput.value = '';
        }
    }

    function rendertags() {
        tagTags.innerHTML = '';
        tags.forEach((tag, index) => {
            const tag1 = document.createElement('span');
            tag1.className = 'badge bg-primary me-1 mb-1';
            tag1.textContent = tag;
            
            const removeBtn = document.createElement('span');
            removeBtn.className = 'ms-1 cursor-pointer';
            removeBtn.innerHTML = '&times;';
            removeBtn.onclick = () => removeTag(index);
            
            tag1.appendChild(removeBtn);
            tagTags.appendChild(tag1);
        });
        hiddenInput.value = tags.join(',');
    }

    function removeTag(index) {
        tags.splice(index, 1);
        rendertags();
    }

    rendertags();

});
  </script>
    @endsection