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
                        <li class="breadcrumb-item active">Job Category</li>
                    </ol>
                </div>
                <h4 class="page-title">Job Categories</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Job Categories</h4>
                                            <button  class="btn btn-info pull-right" data-toggle="modal" data-target="#addModal">Add New</button>
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
                                                        <th>Job Category Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($jobcats as $cat)
                                    <tr>
                                        <td>{{$cat->title}}</td>
                                        <td>                                                       
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editModal" data-id="{{ $cat->id }}" data-name="{{ $cat->title }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(`{{ $cat->id }}`)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <form id="delete-form-{{ $cat->id }}" action="{{ route('coffee.delete-job-category', $cat->id) }}" method="POST" style="display: none;">
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

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Job Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{route('coffee.store-job-category')}}" method="POST">
                    @csrf
                   

                    <div class="form-group">
                        <label for="categoryTitle">Name</label>
                        <input type="text" class="form-control" id="categoryTitle" name="title" required>
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Job Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST" >
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="categoryId">

                    <div class="form-group">
                        <label for="categoryName">Name</label>
                        <input type="text" class="form-control" id="categoryName" name="title" required>
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
        if (confirm('Are you sure you want to delete this job category?')) {
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
        modal.find('#categoryName').val(name);

        modal.find('#editForm').attr('action', `update-job-category/${id}`);


    });
});
    </script>
    @endsection