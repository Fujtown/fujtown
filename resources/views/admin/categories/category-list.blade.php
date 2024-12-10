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
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                    <tr>
                                                        <th>Category Name</th>
                                                        <th>Parent Category</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($categories as $cat)
                                    <tr>
                                        <td>{{$cat->category_name}}</td>
                                        <td>{{ $cat->parent_category ? $cat->parent_category->parent_category_name : 'No Parent' }}</td>
                                        <td><img src="{{ asset('storage/' .$cat->category_image) }}" alt="" class="rounded-circle thumb-sm mr-1"></td>
                                        <td>                                                       
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editModal" data-id="{{ $cat->id }}" data-name="{{ $cat->category_name }}" data-name-arabic="{{ $cat->category_name_arabic }}" data-thumb="{{ asset('storage/' . $cat->category_image) }}" data-category_parent="{{$cat->category_parent_id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(`{{ $cat->id }}`)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <form id="delete-form-{{ $cat->category_id }}" action="{{ route('coffee.delete-category', $cat->category_id) }}" method="POST" style="display: none;">
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
                <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="categoryId">

                    <div class="form-group">
                        <label for="categoryName">Name</label>
                        <input type="text" class="form-control" id="categoryName" name="category_name" required>
                    </div>

                    <div class="form-group">
                        <label for="categoryNameArabic">Name (Arabic)</label>
                        <input type="text" class="form-control" id="categoryNameArabic" name="category_name_arabic" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryNameArabic">Select Parent Category</label>
                        <select name="category_parent_id" class="form-control" id="category_parent_id">
                                        <option value="">Select Parent Category</option>
                                        @foreach($pcategories as $pcat)
                                        <option value="{{$pcat->id}}">{{$pcat->parent_category_name}}</option>
                                        @endforeach
                                    </select>
                    </div>

                    <div class="form-group">
                        <label for="categoryThumbnail">Thumbnail</label>
                        <img src="" id="categoryThumbPreview" class="img-fluid mb-2" alt="Thumbnail Preview">
                        <input type="file" class="form-control" id="categoryThumbnail" name="category_thumb">
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
      <!-- Required datatable js -->
      <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('assets/admin/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{asset('assets/admin/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

   <script>
    $(document).ready(function() {
    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );
   </script>

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
        var category_parent = button.data('category_parent');

        var modal = $(this);
        modal.find('#categoryId').val(id);
        modal.find('#categoryName').val(name);
        modal.find('#categoryNameArabic').val(nameArabic);
        modal.find('#category_parent_id').val(category_parent);
        modal.find('#categoryThumbPreview').attr('src', thumb);

        modal.find('#editForm').attr('action', `update-category/${id}`);


    });
});
    </script>
    @endsection