@extends('layouts.body')
@section('content')
<!-- Main content -->
<section class="content">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .header-image {
            background-image: url('https://www.passerellesnumeriques.org/misc/logo-en.png');
            height: 70vh;
            background-size: cover;
            background-position: center 25%;
        }

        .cover {
            height: 70vh;
            background: rgba(0, 0, 0, 0.1);
        }

        .box {
            margin-left: 100px;
        }

        .box h3 {
            color: blue;
            font-family: sans-serif;
            font-size: 50px;
        }
    </style>
    <div class="header-image">
        <div class="cover">

        </div>
    </div>
    <div class="box">
        <h3>Welcome to Student Followup System</h3>
    </div>
</section>
@endsection