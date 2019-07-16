@extends('layouts.master')

@section('title')
    Admin Console | Role
@endsection

@section('content')
    <?php //dd($menu_list) ?>

    <div class="page-title">
        <div class="title-env">
            <h1 class="title">Role</h1>
            <p class="description">Add, Update & Delete User role</p>
        </div>
        <div class="breadcrumb-env">
            <ol class="breadcrumb bc-1" >
                <li>
                    <a href="#"><i class="fa-cog"></i>Admin Console</a>
                </li>
                <li class="active">
                    <strong>Role</strong>
                </li>
            </ol>
        </div>
    </div>
    @include('error.error_msg')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="javascript:;" onclick="jQuery('#add_role').modal('show', {backdrop: 'fade'});" class="btn btn-turquoise">Add Role</a>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table id="role_datatable" class="table table-striped  table-responsive" cellspacing="0" width="100%">
                    <thead style="background-color: #2c2e2f; color: white">
                    <tr>
                        <th style="color: white; vertical-align: text-top;text-align: center " hidden="true">Id</th>
                        <th style="color: white; vertical-align: text-top;text-align: center ">Role Title</th>
                        <th style="color: white; vertical-align: text-top;text-align: center ">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td hidden="true">{{ $role->id }}</td>
                            <td style="text-align: center ">{{ $role->name }}</td>
                            <td style="text-align: center "><a href="javascript:;" onclick="jQuery('#update_role_{{ $role->id }}').modal('show', {backdrop: 'fade'});" class="btn btn-blue btn-sm btn-icon">Edit</a> <a href="javascript:;" class="btn btn-red btn-sm btn-icon" onclick="$(this).find('#del_form').submit();">Delete <form id="del_form" action="{{ url('role/'.$role->id) }}" method="POST" onsubmit="return confirm_delete()">@method('DELETE')
                                        @csrf</form></a> <a href='{{ url("role/{$role->id}/config") }}' class="btn btn-warning btn-sm btn-icon">Config</a></td>
                        </tr>
                        <div class="modal fade" id="update_role_{{ $role->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ url('role/'.$role->id) }}" method="POST" class="validate" role="form">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Update Role</h4>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title">Role Title <span style="color: red;">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" data-validate="required" placeholder="Ex: Subscriber">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="description" class="form-control" cols="30" rows="2" data-validate="maxlength[150]" placeholder="Max 150 Character">{{ $role->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info">Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add_role">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('role') }}" method="POST" class="validate" role="form" id="form1">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">New Role</h4>
                    </div>
                    
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Role Title <span style="color: red;">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" data-validate="required" placeholder="Ex: Subscriber">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="2" data-validate="maxlength[150]" placeholder="Max 150 Character">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>                    
                </form>
                
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#role_datatable').DataTable({
                responsive: true,
                aLengthMenu: [
                    [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                ]
            });
        } );
        function confirm_delete() {
            if(confirm('Are you sure want to delete?')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

