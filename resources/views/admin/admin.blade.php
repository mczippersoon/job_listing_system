@include ('layouts.partials.header')




@include ('layouts.partials.sidebar')

          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content" class="pb-2">
                        @include ('layouts.partials.topbar')
                        <!-- Begin Page Content -->
                            <!-- Page Heading -->
                            <div class="container-fluid">
                                    @yield('content')
                            </div>
                        <!-- /.container-fluid -->
                    </div>
            </div>
            <!-- End of Main Content -->
          

@include ('layouts.partials.scripts')
@include('layouts.partials.modal')
@include ('layouts.partials.footer')



