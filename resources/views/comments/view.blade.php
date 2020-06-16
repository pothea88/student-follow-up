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
                        <h3 class="text-center text-primary">Comment</h3>
                    </div>
                    <!-- /.card-header -->
                    <?php
                    $role_id = DB::table('role_user')->where('user_id', Auth::user()->id)->first();
                    $role_name = DB::table('roles')->where('id', $role_id->role_id)->first();
                    ?>

                    <div class="card-body">
                        <div class="clearfix">   
                            <a href="{{route('comment',$students->id)}}"><button type="button" class="btn btn-primary">Add Comment</button></a>
                        </div>
                        <table id="users" class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>Tutor</th>
                                    <th>Message</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students->comments as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->student->firstName}} {{$comment->student->lastName}}</td>
                                    <td>{{$comment->user->name}}</td>
                                    <td>{{$comment->message}}</td>
                                    <td>
                                        @if($comment->user->name == Auth::user()->name)
                                        <a href="{{route('editComment',$comment->id)}}">edit</a>
                                        <a href="{{route('deleteComment',$comment->id)}}">delete</a>  
                                        @endif
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