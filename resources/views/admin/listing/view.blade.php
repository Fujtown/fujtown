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
                        <li class="breadcrumb-item active">Parent Category</li>
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
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Parent Categories</h4>
                                            <div class="add-btn">
                                            <a href="{{route('coffee.parent-category')}}" class="btn btn-info">Add Parent Category</a>
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
                                                        <th>Parent Category Name</th>
                                                        <th>Arabic Name</th>
                                                        <th>Icon</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($pcategories as $pcat)
                                        <tr>
                                            <td>{{$pcat->parent_category_name}}</td>
                                            <td>{{$pcat->parent_category_name_arabic}}</td>
                                            <td><img src="{{ asset('storage/' .$pcat->parent_category_thumb) }}" alt="" class="rounded-circle thumb-sm mr-1"></td>
                                            <td></td>

                                        </tr>
                                                  @endforeach
                                                   
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> <!-- end col -->                   
                            </div> <!-- end row --> 
    
    <!-- end row -->
    
</div><!-- container -->



</div> <!-- Page content Wrapper -->
    @endsection
    
    @section('admin-script')
    <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this category?')) {
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

    document.addEventListener('DOMContentLoaded', function () {
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id');
        var name = button.data('name');
        var nameArabic = button.data('name-arabic');
        var thumb = button.data('thumb');

        var modal = $(this);
        modal.find('#categoryId').val(id);
        modal.find('#categoryName').val(name);
        modal.find('#categoryNameArabic').val(nameArabic);
        modal.find('#categoryThumbPreview').attr('src', thumb);

        modal.find('#editForm').attr('action', `update-parent-category/${id}`);


    });
});
    </script>
    @endsection