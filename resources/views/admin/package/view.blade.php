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
                        <li class="breadcrumb-item active">Packages</li>
                    </ol>
                </div>
                <h4 class="page-title">Packages</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Packages</h4>
                                            <div class="add-btn">
                                            <a href="{{route('coffee.add-package')}}" class="btn btn-info">Add Package</a>
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
                                                        <th>Package Name</th>
                                                        <th>Amount Monthly</th>
                                                        <th>Amount Yearly</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($packages->isEmpty())
                                                <tr>
                                                    <td colspan="3" class="text-center">No Packages found.</td>
                                                </tr>
                                                @else
                                            @foreach($packages as $package)
                                                <tr>
                                                <td>{{ $package->packg_name }}</td>
                                                <td>{{ $package->packg_price_month }}</td>  
                                                <td>{{ $package->packg_price_year }}</td>  
                                                <td>                                                       
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editModal" data-id="{{ $package->id }}" data-name="{{ $package->packg_name }}" data-price-month="{{ $package->packg_price_month }}" data-price-year="{{ $package->packg_price_year }}" data-thumb="{{ asset('storage/' . $package->packg_thumb) }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(`{{ $package->id }}`)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <form id="delete-form-{{ $package->id }}" action="{{ route('coffee.delete-package', $package->id) }}" method="POST" style="display: none;">
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
                <h5 class="modal-title" id="editModalLabel">Edit Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="packageId">

                    <div class="form-group">
                        <label for="categoryName">Name</label>
                        <input type="text" class="form-control" id="packageName" name="package_name" required>
                    </div>

                    <div class="form-group">
                        <label for="categoryNameArabic">Price Month</label>
                        <input type="text" class="form-control" id="priceMonth" name="monthly_price" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryNameArabic">Price Year</label>
                        <input type="text" class="form-control" id="priceYear" name="yearly_price" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="categoryThumbnail">Thumbnail</label>
                        <img src="" id="packageThumbnailPreview" class="img-fluid mb-2" style="    width: 200px;float: right;" alt="Thumbnail Preview">
                        <input type="file" class="form-control" id="packageThumbnail" name="icon">
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
        if (confirm('Are you sure you want to delete this package?')) {
           
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
        var priceMonth = button.data('price-month');
        var priceYear = button.data('price-year');
        var thumb = button.data('thumb');

        var modal = $(this);
        modal.find('#packageId').val(id);
        modal.find('#packageName').val(name);
        modal.find('#priceMonth').val(priceMonth);
        modal.find('#priceYear').val(priceYear);
        modal.find('#packageThumbnailPreview').attr('src', thumb);

        modal.find('#editForm').attr('action', `update-package/${id}`);


    });
});
    </script>
    @endsection