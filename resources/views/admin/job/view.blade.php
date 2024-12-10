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
                        <li class="breadcrumb-item active">Jobs</li>
                    </ol>
                </div>
                <h4 class="page-title">Jobs</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">All Jobs</h4>
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
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Location</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($jobs as $job)
                                    <tr>
                                        <td>{{$job->job_title}}</td>
                                        <td>{{$job->company}}</td>
                                        <td>{{$job->location}}</td>
                                        <td>{{$job->jobcategory->title}}</td>
                                        <td>                                                       
                                        <a href="#" class="btn btn-sm btn-success" >
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(`{{ $job->id }}`)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <form id="delete-form-{{ $job->id }}" action="{{ route('coffee.delete-job-category', $job->id) }}" method="POST" style="display: none;">
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

  
    </script>
    @endsection