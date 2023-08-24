@extends('back.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Assign User Role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Assign User Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <span>
        @if (Session::has('alert'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('alert') }}
            </div>
        @endif
    </span>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- trading history area start -->
            <div class="col-lg-12 mt-sm-30 mt-xs-30">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4 class="header-title">Assign User Role</h4>
                            <div class="trd-history-tabs">
                              
                            </div>
                            <div class="custome-select border-0 pr-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">Assign
                                    User Role</button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="heading-td">
                                            <th>User</th>
                                            <th>Manage Pricing</th>
                                            <th>Manage Files</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($u_role as $roles)
                                            <tr>
                                                <td>{{ \App\Models\User::where('id', $roles->user_id)->first()->name ?? null }}</td>
                                                <td>
                                                    @if ($roles->manage_pricing == '1')
                                                        {{ 'Assign' }}
                                                    @else
                                                        {{ 'Not Assign' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($roles->manage_files == '1')
                                                        {{ 'Assign' }}
                                                    @else
                                                        {{ 'Not Assign' }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Assign User Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-group">User
                                        <input list="user" class="form-control user" name="user" /></label>
                                    <datalist id="user">
                                        {{ $user = App\Models\User::where('type', '!=', 'admin')->orWhere('type', '!=', 'Admin')->where('status', 'Active')->get() }}
                                        @foreach ($user as $use)
                                            <option value="{{ $use->name }}"></option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <span>User Can Access</span>
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Pricing">Pricing <input type="checkbox" name="can_manage_pricing" id="pricing_check" value="0"></label>
                            </div>
                            <div class="col-md-3">
                                <label for="files">Files <input type="checkbox" name="can_manage_files" id="files_check" value="0"> </label>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="button" id="assign_role" name="submit" value="Save" class="btn btn-success">
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- trading history area end -->
@endsection
@section('script')
    <script src="{{ asset('back/user/role.js') }}"></script>
@endsection
