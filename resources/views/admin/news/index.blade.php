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
                        <li class="breadcrumb-item active">News</li>
                    </ol>
                </div>
                <h4 class="page-title">News</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">News</h4>
                                            <div class="add-btn">
                                            <a href="{{route('coffee.add-news')}}" class="btn btn-info">Add News</a>
                                            </div>
                                            @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if(session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif  
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>News Title</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($news->isEmpty())
                                                <tr>
                                                    <td colspan="3" class="text-center">No News found.</td>
                                                </tr>
                                                @else
                                            @foreach($news as $new)
                                                <tr>
                                                <td>{{ $new->title }}</td>
                                                <td><img src="{{ asset('storage/' .$new->img_src) }}" alt="" class="rounded-circle thumb-sm mr-1"></td>
                                                <td>
                                        <a href="{{route('coffee.edit-news',$new->id)}}" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(`{{ $new->id }}`)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <form id="delete-form-{{ $new->id }}" action="{{ route('coffee.delete-blog', $new->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
    
                                                </td>
                                                </tr>

                                                    @endforeach
                                                     @endif  
                                                   
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> <!-- end col -->                   
                            </div> <!-- end row --> 
    
    <!-- end row -->
    
</div><!-- container -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="categoryId">

                    <div class="form-group">
                        <label for="categoryName">Name</label>
                        <input type="text" class="form-control" id="categoryName" name="parent_category_name" required>
                    </div>

                    <div class="form-group">
                        <label for="categoryNameArabic">Name (Arabic)</label>
                        <input type="text" class="form-control" id="categoryNameArabic" name="parent_category_name_arabic" required>
                    </div>

                    <div class="form-group">
                        <label for="categoryThumbnail">Thumbnail</label>
                        <img src="" id="categoryThumbPreview" class="img-fluid mb-2" alt="Thumbnail Preview">
                        <input type="file" class="form-control" id="categoryThumbnail" name="parent_category_thumb">
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div> <!-- Page content Wrapper -->
    @endsection
    
    @section('admin-script')
    <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this blog?')) {
            // Proceed with deletion
            // alert(id)
            document.getElementById('delete-form-' + id).submit();
        }
    }
    setTimeout(function() {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = "0";
            setTimeout(function() {
                alert.remove();
            }, 500);
        }
    }, 3000); // Adjust time (in milliseconds) as needed

    
    </script>
    @endsection