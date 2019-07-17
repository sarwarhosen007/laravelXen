@extends('layouts.master')

@section('title')
    Admin Console | Create User
@endsection

@section('content')
    <?php //dd($menu_list) ?>

    <div class="page-title">
        <div class="title-env">
            <h1 class="title">Users</h1>
            <p class="description">Add Users</p>
        </div>
        <div class="breadcrumb-env">
            <ol class="breadcrumb bc-1" >
                <li>
                    <a href="#"><i class="fa-cog"></i>Users</a>
                </li>
                <li class="active">
                    <strong>Add User</strong>
                </li>
            </ol>
        </div>
    </div>
    @include('error.error_msg')
    <div class="panel panel-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
            <table id="users_datatable" class="table table-striped  table-responsive" cellspacing="0" width="100%" >
                <thead style="background-color: #2c2e2f; color: white">
                <tr>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Id</th>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Name</th>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Username</th>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Email</th>
                    <th style="color: white; vertical-align: text-top;text-align: center ">Created At</th>
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

            load_user_list(null);

        });

        function load_user_list(roleId){

            var table = $('#users_datatable').DataTable();
            table.destroy();

            $('#users_datatable').DataTable({
                responsive: true,
                "order": [[ 0, "desc" ]],
                aLengthMenu: [
                    [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                ],

                "ajax": {
                    "url": "{{ route('user.loadUser') }}",
                    "type": 'GET',
                    "data": {'roleId':roleId}
                },
            });

        }

        function confirm_role_delete() {
            if(confirm('Are you sure want to delete?')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

