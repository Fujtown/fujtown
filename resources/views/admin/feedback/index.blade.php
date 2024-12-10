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
                        <li class="breadcrumb-item active">Feedback</li>
                    </ol>
                </div>
                <h4 class="page-title">Messages</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Feedback</h4>
                                            
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
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Company</th>
                                                        <th>Subject</th>
                                                        <th>Message</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($messages as $message)
                                                <tr>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->phone}}</td>
                                            <td>{{$message->company}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>{{$message->message}}</td>
                                            <td>                                                       
                                       
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(`{{ $message->id }}`)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <form id="delete-form-{{ $message->id }}" action="{{ route('coffee.feedback', $message->id) }}" method="POST" style="display: none;">
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
  
    @endsection