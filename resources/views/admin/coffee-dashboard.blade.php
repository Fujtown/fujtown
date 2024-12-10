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
                        <li class="breadcrumb-item"><a href="#">Zoogler</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-contain">
                                <div class="row">
                                    <div class="col-2 align-self-center">
                                        <img src="{{asset('assets/admin/images/directory.png')}}" alt="">
                                    </div>
                                    <div class="col-10 text-right">
                                        <h5 class="mt-0 mb-1">25528</h5>
                                        <p class="mb-0 font-12 text-muted">Total Listing</p>   
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body justify-content-center">
                            <div class="icon-contain">
                                <div class="row">
                                    <div class="col-2 align-self-center">
                                    <img src="{{asset('assets/admin/images/portfolio.png')}}" alt="">
                                    </div>
                                    <div class="col-10 text-right">
                                        <h5 class="mt-0 mb-1">96</h5>
                                        <p class="mb-0 font-12 text-muted"> Golden Package  </p>
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body justify-content-center">
                            <div class="icon-contain">
                                <div class="row">
                                    <div class="col-2 align-self-center">
                                    <img src="{{asset('assets/admin/images/smart.png')}}" alt="">
                                    </div>
                                    <div class="col-10 text-right">
                                        <h5 class="mt-0 mb-1">30</h5>
                                        <p class="mb-0 font-12 text-muted"> Smart Package </p>
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-contain">
                                <div class="row">
                                    <div class="col-2 align-self-center">
                                    <img src="{{asset('assets/admin/images/freezone.png')}}" alt="">
                                    </div>
                                    <div class="col-10 text-right">
                                        <h5 class="mt-0 mb-1">7</h5>
                                        <p class="mb-0 font-12 text-muted"> Freezone Package</p>    
                                    </div>
                                </div>                                                        
                            </div>                                                    
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card ">
                        <div class="card-body">
                            <div class="icon-contain">
                                <div class="row">
                                    <div class="col-2 align-self-center">
                                    <img src="{{asset('assets/admin/images/small.png')}}" alt="">
                                    </div>
                                    <div class="col-10 text-right">
                                        <h5 class="mt-0 mb-1">25135</h5>
                                        <p class="mb-0 font-12 text-muted"> Small Package </p>    
                                    </div>
                                </div>                                                        
                            </div>                                                    
                        </div>
                    </div>
                </div>                                             
            </div> 
                                            
        </div>
                                 
    </div>
  
    
    <!-- end row -->
    
</div><!-- container -->

</div> <!-- Page content Wrapper -->
    @endsection