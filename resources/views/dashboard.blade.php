<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  
</head>
<body>

<div class="container-fluid" style="background:#1B5D8D">
  <div class="row" style="padding-left:110px;">
    <span style="float:left; margin-top:6px; margin-bottom:2px; font-size:30px; color:#fff;">Dashboard</span>
    <a class="text-right btn btn-info" style="float:right; margin-top:8px; margin-bottom:2px; margin-right:110px;" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
   
  </div>
</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      

      <h2 class="text-center">Add New Student</h2>
      <hr>
                                @if(session('sucessMsg'))
                                  <div class="alert alert-success border-success" style="margin: auto; margin-bottom: 20px;">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <i class="icofont icofont-close-line-circled"></i>
                                      </button>
                                      <strong>Success!</strong> {{session('sucessMsg')}}
                                  </div>
                                @endif  

                                @if(count($errors)>0)
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-warning border-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="icofont icofont-close-line-circled"></i>
                                            </button>
                                            <strong>Warning!</strong> {{ $error }}
                                        </div>
                                    @endforeach
                                @endif


  <form class="submit-form" method="POST" action="/add-new-student" id="form">
        @csrf
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>SN</th>
        <th>Name</th>
        <th>University</th>
        <th>Subject</th>
        <th>CGPA</th>
        <th>Gender</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="tbody">
    <tr>
        <td>1</td>
        <td>
        <input type="text" class="form-control" name="std_name[]" required/>
        </td>
        <td>
            <select class="form-control" name="university[]" required>
                <option value="" selected="true" disabled="disabled">--select--</option>
                <option value="Green University">Green University</option>
                <option value="Daffodil University">Daffodil University</option>
            </select>
        </td>
       
        <td>
        <input type="text" class="form-control" name="subject[]" required />
        </td>
        <td>
        <input type="number" class="form-control" name="cgpa[]" step="any" required />
        </td>
        <td>
            <label class="radio-inline">
            <input type="radio" name="gender[]" value="Male" required>Male
            </label>
            <label class="radio-inline">
            <input type="radio" name="gender[]" value="Female" required>Female
            </label>
        </td>
        <td> 
            <button type="button" class="btn btn-primary" onclick="addItem();"><i class="fa fa-plus"></i></button>
        </td>
    </tr>
    </tbody>
  </table>

    
    <input type="submit" style="float:right;" class="btn btn-success" name="savedata" id="savedata" value="Submit"/>
    

      </form>

    </div>
     </div>

{{-- data view part start --}}
     <div class="row">
      <div class="col-md-12">

      <h2 class="text-center">Student List</h2>
      <hr>

                                 @if(session('message'))
                                  <div class="alert alert-success border-success" style="margin: auto; margin-bottom: 20px;">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <i class="icofont icofont-close-line-circled"></i>
                                      </button>
                                      <strong>Success!</strong> {{session('message')}}
                                  </div>
                                @endif  

          <table class="table table-bordered">
          <thead>
            <tr>
              <th>SN</th>
              <th>Name</th>
              <th>University</th>
              <th>Subject</th>
              <th>CGPA</th>
              <th>Gender</th>
              <th>Action</th>
            </tr>
          </thead>
    <tbody id="tbody">

    <?php
      $i=0;
     ?>

    @foreach($allstudent as $student)
    <tr>
        <td>{{++$i}}</td>
        <td>{{$student->std_name}}</td>
        <td>{{$student->university}}</td>
        <td>{{$student->subject}}</td>
        <td>{{$student->cgpa}}</td>
        <td>{{$student->gender}}</td>
        <td> 
            <a href="{{url('update-student/'.$student->id)}}" class="btn btn-info btn-sm "><i class="fa fa-pencil"></i></a>
            <a href="{{url('delete-student/'.$student->id)}}" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    @endforeach
    </tbody>
  </table>

      </div>
     </div>
{{-- data view part end --}}


</div>

<script>
    var index = 0;
    var items = 1;
    function addItem() {
        items++;
        index++;

        var html = "<tr>";
         html += "<td>" + items + "</td>";
         html +="<td>";
         html +="<input type='text' class='form-control' name='std_name[]' required/>";
         html +="</td>";
         html +="<td>";
            html +="<select class='form-control' name='university[]' required>";
               html += "<option value=''>--select--</option>";
               html += "<option value='Green University'>Green University</option>";
                html +="<option value='Daffodil University'>Daffodil University</option>";
           html += "</select>";
        html +="</td>";
       
        html +="<td>";
        html +="<input type='text' class='form-control' name='subject[]' required/>";
        html +="</td>";
        html +="<td>";
        html +="<input type='number' class='form-control' name='cgpa[]' step='any' required/>";
        html +="</td>";
        html +="<td>";
            html +="<label class='radio-inline'>";
            html +="<input type='radio' name='gender["+index+"]' id='gender' value='Male' required>Male";
            html +="</label>";
            html +="<label class='radio-inline'>";
            html +="<input type='radio' name='gender["+index+"]' id='gender' value='Female' required>Female";
            html +="</label>";
        html +="</td>";
        html +="<td>" ;
        html +="<button type='button' class='btn btn-danger' onclick='deleteRow(this);'><i class='fa fa-trash'></i></button>";
        html +="</td>";
        html +="</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }
 
function deleteRow(button) {
    button.parentElement.parentElement.remove();
    // first parentElement will be td and second will be tr.
}

{{--  custom validation start  --}}
</script>
  {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
   <script>
    $(document).ready(function () {
    $('#form').validate({ 
        rules: {

        },

    });
});
</script>  --}}
{{--  custom validation end  --}}
</body>
</html>