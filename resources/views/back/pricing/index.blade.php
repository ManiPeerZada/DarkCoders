@extends('back.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Pricing Plans</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Pricing Plans</li>
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
                            <h4 class="header-title">Pricing Plan</h4>
                            <div class="trd-history-tabs">

                            </div>
                            <div class="custome-select border-0 pr-3">
                                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Add
                                    Pricing Plan</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="heading-td">
                                            <th>Sr#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pricing as $set)
                                            <tr>
                                                <td>{{ $set->id }}</td>
                                                <td id="p_name_{{ $set->id }}">{{ $set->name }}</td>
                                                <td id="p_price_{{ $set->id }}">{{ $set->price }}</td>
                                                <td id="p_desc_{{ $set->id }}">{{ $set->description }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm edit_plan" data-toggle="modal"
                                                        data-target="#edit_ModalCenter" data-id="{{ $set->id }}">
                                                        <i class="fas fa-edit"></i> </button>
                                                    <button class="btn btn-danger btn-sm delete_plan" data-id="{{ $set->id }}"><i
                                                            class="fa fa-trash"></i></button>

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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Manage Pricing Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('/add_pricing_plan') }} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Heading">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Heading">Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Heading">Description</label>
                            <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
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
                    <h5 class="modal-title" id="edit_ModalCenterTitle">Edit Pricing Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update_pricing') }}" method="POST">
                        @csrf
                        <input type="hidden" name="e_id" id="e_id">
                        <div class="form-group">
                            <label for="Heading">Name</label>
                            <input type="text" name="e_name" id="e_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Heading">Price</label>
                            <input type="text" name="e_price" id="e_price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Heading">Description</label>
                            <textarea name="e_description" id="e_description" cols="30" rows="4" class="form-control"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="Update" id="upd_pricing" value="Update" class="btn btn-success">
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('back/pricing/pricing.js') }}"></script>
@endsection
