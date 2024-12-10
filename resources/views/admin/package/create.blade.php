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
                        <div class="card-body bootstrap-select-1">
                            <h4 class="mt-0 header-title">Package</h4>
                            <p class="text-muted mb-4 font-13">Add Package. </p>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                            <form action="{{route('coffee.store-package')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-0">Name</h6>                                            
                                    <input type="text" name="package_name" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-6">
                                    <h6 class=" input-title mb-2 mt-0">Icon</h6>                                            
                                    <input type="file" name="icon" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-6 mt-10">
                                    <h6 class=" input-title mb-2 mt-0">Monthly Price</h6>                                            
                                    <input type="text" name="monthly_price" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-6 mt-10">
                                    <h6 class=" input-title mb-2 mt-0">Yearly Price</h6>                                            
                                    <input type="text" name="yearly_price" class="form-control" /> 
                                </div>                                    
                                <div class="col-md-12 mt-10">
                                <div class="row">
    <div class="col-md-10">
        <h6 class="input-title mb-2 mt-0">Add Points</h6>
        <input type="text" name="points[]" class="form-control" placeholder="Enter a point" />
        <div class="sub-points-container mt-2"></div> <!-- Container for sub-points -->
        <button class="btn btn-secondary btn-sm add-sub-point mt-2" type="button">+ Add Sub-point</button>
    </div>
    <div class="col-md-2">
        <h6 class="input-title mb-2 mt-0">&nbsp;</h6>
        <button class="btn btn-info add-point" type="button">+</button>
    </div>
</div>
                            </div>

                            <!-- Container for dynamically added input fields -->
                            <div class="col-md-12 mt-10" id="points-container"></div>                        
                                               
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
                                       
                            </div> <!-- end row --> 
    
    <!-- end row -->
    
</div><!-- container -->

</div> <!-- Page content Wrapper -->
    @endsection

    @section('admin-script')
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const pointsContainer = document.getElementById('points-container');

    // Function to add sub-points only for the first main point
    document.querySelector('.add-sub-point').addEventListener('click', function() {
        const subPointsContainer = document.querySelector('.sub-points-container');

        // Create a new sub-point row with input and remove button
        const subPointRow = document.createElement('div');
        subPointRow.classList.add('row', 'mt-2', 'sub-point-row');
        
        subPointRow.innerHTML = `
            <div class="col-md-10">
                <input type="text" name="sub_points[]" class="form-control" placeholder="Enter a sub-point" />
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger btn-sm remove-sub-point" type="button">-</button>
            </div>
        `;

        // Append the new sub-point row to the sub-points container
        subPointsContainer.appendChild(subPointRow);

        // Add event listener to the remove button for the sub-point
        subPointRow.querySelector('.remove-sub-point').addEventListener('click', function() {
            subPointRow.remove();
        });
    });

    // Add new main points (without sub-point functionality)
    document.querySelector('.add-point').addEventListener('click', function() {
        // Create a new main point row without the sub-point button
        const mainPointRow = document.createElement('div');
        mainPointRow.classList.add('row', 'mt-3', 'main-point-row');
        
        mainPointRow.innerHTML = `
            <div class="col-md-10">
                <input type="text" name="points[]" class="form-control" placeholder="Enter a point" />
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger remove-point" type="button">-</button>
            </div>
        `;

        // Append the new main point row to the points container
        pointsContainer.appendChild(mainPointRow);

        // Add event listener to the remove button for the main point
        mainPointRow.querySelector('.remove-point').addEventListener('click', function() {
            mainPointRow.remove();
        });
    });
});
</script>
    @endsection