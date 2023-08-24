@extends('back.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage User Role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage User Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- trading history area start -->
            <div class="col-lg-12 mt-sm-30 mt-xs-30">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4 class="header-title">User Role</h4>
                            <div class="trd-history-tabs">
                                {{-- <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab">Manage Users</a>
                            </li>

                        </ul> --}}
                            </div>
                            <div class="custome-select border-0 pr-3">
                                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Add
                                    User Role</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="heading-td">
                                            <th>Sr#</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($r as $set)
                                            <tr>
                                                <td>{{ $set->id }}</td>
                                                <td id="r_role_{{ $set->id }}">{{ $set->role }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm edit_user" data-toggle="modal"
                                                        data-target="#edit_ModalCenter" data-id="{{ $set->id }}">
                                                        <i class="fas fa-edit"></i> </button>
                                                    <a href=" {{ url('del_role/' . $set->id) }} "
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Manage Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('/add_role') }} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Heading">User Role</label>
                            <input type="text" name="role" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" id="submit" value="Save" class="btn btn-success">
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-----Edit Mod----->
    <div class="modal fade" id="edit_ModalCenter" tabindex="-1" role="dialog" aria-labelledby="edit_ModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_ModalCenterTitle">Edit User Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <input type="hidden" name="e_id" id="e_id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Name">User Role</label>
                                    <input type="text" name="e_role" id="e_role" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="button" name="Update" id="upd_role" value="Update" class="btn btn-success">
                </div>
            </div>

        </div>
    </div>
    <!-- trading history area end -->
@endsection
@section('script')
    <script src="{{ asset('back/user/role.js') }}"></script>
@endsection
