<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
  <link rel="stylesheet" href="../css/app.css">
</head>

<body>
  <div class="container">
    <h1 class="text-center mt-5">Student Information</h1>
    <hr>
    <div class="row">
      <div class="col-5"></div>
      <div class="col-3">
        <img src="{{ asset('uploads/students/' . $detail->avatar) }}" style="width: 170px;" alt="image">
      </div>
      <div class="col-4"></div>
    </div>
    <div class="row mt-5">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>FullName</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Year</th>
            <th>Stuent_id</th>
            <th>Province</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$detail->id}}</td>
            <td>{{$detail->firstName}} {{$detail->lastName}}</td>
            <td>{{$detail->gender}}</td>
            <td>{{$detail->class}}</td>
            <td>{{$detail->year}}</td>
            <td>{{$detail->student_id}}</td>
            <td>{{$detail->province}}</td>
            <td>
              <?php if($detail->status == 0){
                echo "Student normal";
              }elseif($detail->status == 1){
                echo "Student Followup";
              }else{
                echo "Out of followup";
              } ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>