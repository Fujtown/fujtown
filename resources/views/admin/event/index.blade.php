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
                        <li class="breadcrumb-item active">Trips & Events</li>
                    </ol>
                </div>
                <h4 class="page-title">Events</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Listing Trips & Events</h4>
                                            <div class="add-btn">
                                            <a href="{{route('coffee.add-event')}}" class="btn btn-info">Add Event/Trip</a>
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
                                                        <th>Name</th>
                                                        <th>Image</th>
                                                        <th>Date</th>
                                                        <th>Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($events->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="text-center">No Events / Trips found.</td>
                                                </tr>
                                                @else
                                            @foreach($events as $event)
                                                <tr>
                                                <td>{{ $event->trip_title }}</td>
                                               
                                                <td><img src="{{ asset('storage/' .$event->trip_image) }}" alt="" class="rounded-circle thumb-sm mr-1"></td>
                                                <td><p>Start Date:{{ $event->trip_date }}</p>
                                                    <p>End Date:{{ $event->end_date }}</p></td>
                                                <td>{{ $event->trip_type }}</td>
                                                <td>
                                        <a href="{{route('coffee.edit-blog',$event->id)}}" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(`{{ $event->id }}`)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <form id="delete-form-{{ $event->id }}" action="{{ route('coffee.delete-event', $event->id) }}" method="POST" style="display: none;">
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


</div> <!-- Page content Wrapper -->
    @endsection
    
    @section('admin-script')
    <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this event?')) {
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