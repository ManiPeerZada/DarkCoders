@extends('back.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Users</li>
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
                            <h4 class="header-title">Users</h4>
                            <div class="trd-history-tabs">
                                {{-- <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab">Manage Users</a>
                            </li>

                        </ul> --}}
                            </div>
                            <div class="custome-select border-0 pr-3">
                                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Add
                                    Users</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="heading-td">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($u as $set)
                                            <tr>
                                                <td id="u_name_{{ $set->id }}">{{ $set->name }}</td>
                                                <td id="u_mail_{{ $set->id }}">{{ $set->email }}</td>
                                                <td id="u_type_{{ $set->id }}">{{ $set->type }}</td>
                                                @if ($set->type != 'admin')
                                                    <td id="u_role_{{ $set->id }}">
                                                        {{ App\Models\Role::where('id', $set->role)->first()->role }}</td>
                                                    <td>

                                                        <a href="javascript:;" id="sts_{{ $set->id }}"
                                                            onclick="update_sts({{ $set->id }})"><span>
                                                                @if ($set->status != 'Active')
                                                                    <span
                                                                    class="text-danger">{{ $set->status }}</span>@else<span
                                                                        class="text-success">{{ $set->status }}</span>
                                                                @endif
                                                            </span>
                                                        </a>

                                                    </td>
                                                @endif
                                                <td>
                                                    @if ($set->id != 1)
                                                        <button class="btn btn-primary btn-sm edit_user" data-toggle="modal"
                                                            data-target="#edit_ModalCenter" data-id="{{ $set->id }}">
                                                            <i class="fas fa-edit"></i> </button>
                                                        <a href=" {{ url('del_use/' . $set->id) }} "
                                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Manage User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('/add_user') }} " enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Heading">User Name</label>
                                    <input type="text" name="heading" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="img">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-group">Select Type
                                        <input list="type" class="form-control type" name="type" /></label>
                                    <datalist id="type">
                                        <option value="Admin"></option>
                                        <option value="user"></option>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-group">Select Role
                                        <input list="role" class="form-control role" name="role" /></label>
                                    <datalist id="role">
                                        {{ $role = App\Models\Role::get() }}
                                        @foreach ($role as $rol)
                                            <option value="{{ $rol->role }}"></option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
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
                    <h5 class="modal-title" id="edit_ModalCenterTitle">Edit User</h5>
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
                                    <label for="Name">User Name</label>
                                    <input type="text" name="e_name" id="e_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="e_mail" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="img">Password</label>
                                    <input type="password" name="e_password" id="e_password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-group">Select Type
                                        <input list="e_type" class="form-control e_type" name="e_type" /></label>
                                    <datalist id="e_type">
                                        <option value="Admin"></option>
                                        <option value="user"></option>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-group">Select Role
                                        <input list="role" class="form-control e_role" name="role" /></label>
                                    <datalist id="role">
                                        {{ $role = App\Models\Role::get() }}
                                        @foreach ($role as $rol)
                                            <option value="{{ $rol->role }}"></option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="button" name="Update" id="upd_user" value="Update" class="btn btn-success">
                </div>
            </div>

        </div>
    </div>
    <!-- trading history area end -->
@endsection
@section('script')
    <script src="{{ asset('back/user/user.js') }}"></script>
@endsection
