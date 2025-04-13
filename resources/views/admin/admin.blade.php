@include ('layouts.partials.header')




@include ('layouts.partials.sidebar')

          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">
                        @include ('layouts.partials.topbar')
                        <!-- Begin Page Content -->
                            <!-- Page Heading -->
                            <div class="row mt-5">    
                                <div class="col-12 col-md-8 mt-2 ml-auto mr-auto d-flex justify-content-center align-items-center">
                                    @yield('content')
                                </div>
                            </div>
                        <!-- /.container-fluid -->
                    </div>
            </div>
            <!-- End of Main Content -->
@include ('layouts.partials.scripts')
@include('layouts.partials.modal')
@include ('layouts.partials.footer')



