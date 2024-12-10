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
                        <li class="breadcrumb-item active">FAQ Category</li>
                    </ol>
                </div>
                <h4 class="page-title">FAQ Categories</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">FAQ Categories</h4>
                                            <div class="add-btn">
                                            <a href="{{route('coffee.add-faq-category')}}" class="btn btn-info">Add FAQ Category</a>
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
                                                        <th>FAQ Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($fcategories as $fcat)
                                                <tr>
                                            <td>{{$fcat->name}}</td>
                                            <td>                                                       
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editModal" data-id="{{ $fcat->id }}" data-name="{{ $fcat->name }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(`{{ $fcat->id }}`)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <form id="delete-form-{{ $fcat->id }}" action="{{ route('coffee.delete-faq-category', $fcat->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </td>

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
                <form id="editForm" action="" method="POST" >
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="FcategoryId">

                    <div class="form-group">
                        <label for="FcategoryName">Name</label>
                        <input type="text" class="form-control" id="FcategoryName" name="name" required>
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

        var modal = $(this);
        modal.find('#categoryId').val(id);
        modal.find('#FcategoryName').val(name);

        modal.find('#editForm').attr('action', `update-faq-category/${id}`);


    });
});
    </script>
    @endsection