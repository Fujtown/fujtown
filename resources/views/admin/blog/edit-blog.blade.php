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
                        <li class="breadcrumb-item active">Blog Category</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Blog</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body bootstrap-select-1">
                            <h4 class="mt-0 header-title">Blog </h4>
                            <p class="text-muted mb-4 font-13">Edit Blog. </p>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{route('coffee.update-blog',$blog->blog_id)}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-0">Title</h6>                                            
                                    <input type="text" name="blog_title" value="{{$blog->title}}" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Keywords</h6>                                            
                                    <input type="text" name="blog_keywords"  id="keywords" class="form-control" /> 
                                </div>   
                                <div id="keyword-tags" class="mt-2"></div>
                                <input type="hidden" id="keywords-hidden" value="{{ $blog->keywords }}" name="keywords" />                                 
                                
                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Blog Category</h6>                                            
                                    <select class="form-control" name="blog_categories" id="">
                                       <option value="">Select Blog Category</option> 
                                       @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $category->id == $blog->blog_cat_id ? 'selected' : '' }}>{{$category->blog_cat_name}}</option>
                                       @endforeach
                                    </select>
                                </div> 

                                <div class="col-md-12">
                                <div class="row">
                                <div class="col-md-10">
                                    <h6 class=" input-title mb-2 mt-10">Image</h6>                                            
                                    <input type="file" name="blog_image"  class="form-control" /> 
                                </div>

                                    <div class="col-md-2">
                                    <div class="mt-2">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="width: 100px; height: auto;">
                                </div>
                                    </div>
                                </div>
                               
                                </div>

                                <div class="col-md-12">
                                    <h6 class=" input-title mb-2 mt-10">Description </h6>                                            
                                    <textarea id="elm1" name="description">
                                    {!! $blog->description !!}
                                    </textarea>
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
    const keywordInput = document.getElementById('keywords');
    const keywordTags = document.getElementById('keyword-tags');
    const hiddenInput = document.getElementById('keywords-hidden');
    // let keywords = [];
    let keywords = hiddenInput.value ? hiddenInput.value.split(',') : [];


    keywordInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ',' || e.key === 'Tab') {
            e.preventDefault();
            addKeyword();
        }
    });

    
    function addKeyword() {
        const keyword = keywordInput.value.trim();
        if (keyword && !keywords.includes(keyword)) {
            keywords.push(keyword);
            renderKeywords();
            keywordInput.value = '';
        }
    }

    function renderKeywords() {
        keywordTags.innerHTML = '';
        keywords.forEach((keyword, index) => {
            const tag = document.createElement('span');
            tag.className = 'badge bg-primary me-1 mb-1';
            tag.textContent = keyword;
            
            const removeBtn = document.createElement('span');
            removeBtn.className = 'ms-1 cursor-pointer';
            removeBtn.innerHTML = '&times;';
            removeBtn.onclick = () => removeKeyword(index);
            
            tag.appendChild(removeBtn);
            keywordTags.appendChild(tag);
        });
        hiddenInput.value = keywords.join(',');
    }

    function removeKeyword(index) {
        keywords.splice(index, 1);
        renderKeywords();
    }

    renderKeywords();

});
  </script>
    @endsection