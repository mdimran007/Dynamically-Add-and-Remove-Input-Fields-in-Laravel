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
    <span style="float:left; margin-top:6px; margin-bottom:2px; font-size:30px;"><a href="{{url('/dashboard')}}" style="color:#fff; text-decoration:none;"><i class="fa fa-arrow-left"></i> Back </a></span>
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
    <div class="col-md-8" style="margin:auto; float:none;">
      

      <h2 class="text-center">Update Student</h2>
      <hr>

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


      <form class="submit-form" id="submit-form"  method="POST" action="/update-student">
        @csrf   


        <input type="hidden" value="{{$student->id}}" name="id" /> 
        
        <div class="form-group">
            <label for="StudentName">Student Name</label>
            <input type="text" class="form-control" name="std_name" id="StudentName" value="{{$student->std_name}}" required />
        </div>
        
       
        <div class="form-group">
            <label for="University">University</label>
            <select class="form-control" name="university" id="University" required>
                @if($student->subject=="Green University")
                    <option selected="true">Green University</option>
                    <option>Daffodil University</option>
                @else
                    <option>Green University</option>
                    <option selected="true">Daffodil University</option>
                @endif
            </select>
        </div>
            
 
        <div class="form-group">
            <label for="Subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="Subject" value="{{$student->subject}}" required />
        </div>
        
     
        <div class="form-group">
            <label for="CGPA">CGPA</label>
             <input type="number" class="form-control" name="cgpa" id="CGPA" step='any' value="{{$student->cgpa}}" required />
        </div>
       
     
        <div class="form-group">
            <label for="Gender">Gender</label>

                @if($student->gender == "Male")
                <label class="radio-inline">
                <input type="radio" name="gender" value="Male" checked>Male
                </label>
                <label class="radio-inline">
                <input type="radio" name="gender" value="Female">Female
                </label>
                @else
                <label class="radio-inline">
                <input type="radio" name="gender" value="Male">Male
                </label>
                <label class="radio-inline">
                <input type="radio" name="gender" value="Female" checked>Female
                </label>
                @endif
        </div>

        <input type="submit" class="btn btn-success" value="Update"/>
 

      </form>

    </div>
     </div>




</div>


</body>
</html>