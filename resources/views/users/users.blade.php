@extends('layouts.master')

@section('title')
    Admin Console | Users
@endsection

@section('content')
    <?php //dd($menu_list) ?>

    <div class="page-title">
        <div class="title-env">
            <h1 class="title">Users</h1>
            <p class="description">Add, Update & Delete Users</p>
        </div>
        <div class="breadcrumb-env">
            <ol class="breadcrumb bc-1" >
                <li>
                    <a href="#"><i class="fa-cog"></i>Admin Console</a>
                </li>
                <li class="active">
                    <strong>Users</strong>
                </li>
            </ol>
        </div>
    </div>
    @include('error.error_msg')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ url('/role/add_role') }}" class="btn btn-turquoise">Add User</a>
        </div>
        <div class="panel-body">
            <table id="users_datatable" class="table table-striped  table-responsive" cellspacing="0" width="100%" >
                <thead style="background-color: #2c2e2f; color: white">
                <tr>
                    <th hidden="true">Id</th>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Name</th>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Username</th>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Email</th>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Created At</th>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Status</th>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#users_datatable').DataTable({
                responsive: true,
                "order": [[ 0, "desc" ]],
                aLengthMenu: [
                    [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                ]
            });
        } );
        function confirm_role_delete() {
            if(confirm('Are you sure want to delete?')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

