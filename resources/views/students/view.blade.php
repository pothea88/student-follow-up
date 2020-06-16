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
                        <h3 class="text-center text-primary">Student Management</h3>
                    </div>
                    <!-- /.card-header -->
                    <?php
                    $role_id = DB::table('role_user')->where('user_id', Auth::user()->id)->first();
                    $role_name = DB::table('roles')->where('id', $role_id->role_id)->first();
                    ?>

                    <div class="card-body">
                        <div class="clearfix">
                            <?php if ($role_name->name == 'admin') { ?>
                                <a href="add"><button type="button" class="btn btn-primary">Add Student</button></a>
                            <?php } ?>
                            <?php if($role_name->name == 'normal_user'){ ?>
                            <a href="{{route('mentor',$role_id->id)}}"><button type="button" class="btn btn-primary">Student Mentor</button></a>
                            <?php } ?>
                        </div>
                        <table id="users" class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>Class</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>Tutor Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->firstName}} {{$student->lastName}}</td>
                                    <td>{{$student->gender}}</td>
                                    <td>{{$student->class}}</td>
                                    <td>{{$student->year}}</td>
                                    <td>
                                        <?php 
                                            if($student->status == 0){
                                                echo "Student normal";
                                            }else if($student->status == 1){
                                                echo "Student Followup";
                                            }else{
                                                echo "Out of followup";
                                            }
                                        ?>
                                    </td>
                                    <td>{{$student->user->name}}</td>
                                    <td>
                                        <?php if ($role_name->name == 'admin') { ?>
                                            <a href="{{route('showEdit',$student->id)}}"><i class="fas fa-edit"></i></a>
                                        <?php } ?>
                                        <a href="{{route('detail',$student->id)}}">detail</a>  
                                        <a href="{{route('viewComment',$student->id)}}">Comment</a>
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
    $(function() {
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