@extends('layouts.body')
@push('headers')
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-primary">User Management</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{url('users/add')}}"><button type="button" class="btn btn-primary">Add User</button></a>
                        </div>
                        <table id="users" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role Type</th>
                                    <th>Position</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    @foreach($item->roles as $role)
                                        <td>{{$role->name}}</td>
                                    @endforeach
                                    <td>{{$item->position}}</td>
                                    <td>{{$item->address}}</td>
                                    <td><?php 
                                        if($item->status == 1){
                                            echo "Active";
                                        }else{
                                            echo "Inactive";
                                        }
                                    ?></td>
                                    <td>
                                        <a href="{{url('users/edit/'.$item->id)}}"><i class="fas fa-edit"></i></a>
                                        <?php if($role->name != 'admin'){?>
                                            <a href="{{route('mentor',$item->id)}}">Mentor_On</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="{{ url('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
      $('#users').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
</script>
@endpush