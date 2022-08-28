@extends('layout.master')
@section ('title', 'User Page')

@section('link')
<link rel="stylesheet" href=" {{ asset('css/user.css') }} ">
@endsection



@section('content')


<!-- -->
<div aria-label="breadcrumb" class="main-breadcrumb  " style='opacity: 0;'>
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>

        <li class="breadcrumb-item active" aria-current="page">Profile Page</li>
    </ol>
</div>
<!--  -->
<!--  -->
<div aria-label="breadcrumb" class="main-breadcrumb mt-5 ">
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>

        <li class="breadcrumb-item active" aria-current="page">Profile Page</li>
    </ol>
</div>
<!--  -->
<div class="container mt-5">
    <div class="main-body">

    @if (session('message1'))
        <div class="alert alert-success mb-5 " role="alert">
            {{session('message1')}}
        </div>
        @endif

        @if (session('message'))
        <div class="alert alert-success mb-5 " role="alert">
            {{session('message')}}
        </div>
        @endif
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if(Auth::user()->user_img)
                            <img src="{{asset('/storage/img/'.Auth::user()->user_img) }}" alt="Admin"
                                class="rounded-circle" height="150" width="150">
                            <!-- <a href="/addItem"> edit</a> -->
                            @else
                            <img src="{{asset('img/person-icon.png')}} " alt="Admin" class="rounded-circle" width="150">
                            @endif

                            <div class="mt-3">
                                <h4>{{  Auth::user()->name}}</h4>
                                <div class="row d-flx">
                                    <form action="/added" method="post" enctype="multipart/form-data" id="editPic">
                                        @csrf
                                        <input type="file" name="img" required style="font-size:small;">
                                        <input type="submit" name="addItem" value="edit" style="font-size:small;">
                                    </form>
                                </div>
                                <button type="subimt" onclick="show()" class="butt"><i class="fa-solid fa-pen-to-square"
                                        id="ed"></i></button>

                                <a href=""></a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3" id="use1">
                    <h4 class='p-3'>Basic Information</h4>
                    <ul class="list-group list-group-flush mt-2">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap ">
                            <h6 class="mb-0">First Name</h6>
                            <span class="text-secondary"><span class="text-secondary">{{  Auth::user()->name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap ">
                            <h6 class="mb-0">Last Name</h6>
                            <span class="text-secondary"><span
                                    class="text-secondary">{{  Auth::user()->user_lname}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Email Address</h6>
                            <span class="text-secondary">{{  Auth::user()->email}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Phone Number</h6>
                            <span class="text-secondary">{{  Auth::user()->user_phone}}</span>
                        </li>
                        </li>

                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn " onclick="show1()"
                                        style="background-color: #008E89; color:white;">Edit</button>
                                </div>
                        </li>
                    </ul>
                </div>
                <!--  -->
                <form method="post" action="{{url('/updateuser')}}" id='use'>

                    @csrf
                    <div class="card mt-3">
                        <h6 class='p-3'>Basic Information</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <p class="mb-0">First Name</p>
                                <input type="text" name="name" value="{{  Auth::user()->name}}"
                                    class="@error('name') is-invalid @enderror">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <p class="mb-0">Last Name</p>
                                <input type="text" name="user_lname" value="{{  Auth::user()->user_lname}}"
                                    class="@error('user_lname') is-invalid @enderror">
                                @error('user_lname')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <p class="mb-0">Email Address</p>
                                <input type="text" name="email" value="{{  Auth::user()->email}}"
                                    class="@error('name') is-invalid @enderror">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <p class="mb-0">Phone Number</p>
                                <input type="text" name="phone" value="{{  Auth::user()->user_phone}}"
                                    class="@error('name') is-invalid @enderror">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <button class="btn " type="submit"
                                            style="background-color: #008E89; color:white;"> edit</button>
                                    </div>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <h4 class='p-3'>Update your medical information</h4>
                    <form action="/updateusermed" method="post" class='p-3'>
                    @csrf
                        <div class="form-group">
                            <!-- Gender('Male', 'Female') -->
                            <label for="inputAddress"> ID Number</label>
                            <input type="number" class="form-control" id="inputAddress"
                                value="{{  Auth::user()->user_id_num }}" name='user_id_num'>
                                @error('user_id_num')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Date of birth</label>
                                <input type="date" class="form-control" id="inputAddress2"
                                    value="{{  Auth::user()->user_dob}}" name='user_dob'>
                                    @error('user_dob')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="form-group col-md-6">
                                <p>Gender</p>
                                <div class="form-check form-check-inline">
                                  @if(Auth::user()->gender =='Female')
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                        value="Female" checked>
                                        @else
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                        value="Female" >
                                        @endif
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                @if(Auth::user()->gender =='Male')
                                    <input class="form-check-input" type="radio" name="gender" value="Male" checked>
                                    @else
                                    <input class="form-check-input" type="radio" name="gender" value="Male" >
                                    @endif
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                            </div>
                          
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Weight</label>
                                <input type="text" class="form-control" id="inputEmail4"
                                    value="{{  Auth::user()->weight}}"  name='weight'>
                                    @error('weight')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Height</label>
                                <input type="text" class="form-control" id="inputPassword4" name='height'
                                    value="{{  Auth::user()->height}}">
                                    @error('height')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">

                                <p>Marital</p>
                                <div class="form-check form-check-inline">
                                @if(Auth::user()->marital =='single')
                                    <input class="form-check-input" type="radio" name="marital" id="inlineRadio2"
                                        value="single" checked>
                                        @else
                                        <input class="form-check-input" type="radio" name="marital" id="inlineRadio2"
                                        value="single" >
                                        @endif
                                    <label class="form-check-label" for="inlineRadio2">single</label>
                                </div>
                                <div class="form-check form-check-inline">
                                @if(Auth::user()->marital =='married')
                                    <input class="form-check-input" type="radio" name="marital" value="married" checked>
                                    @else
                                    <input class="form-check-input" type="radio" name="marital" value="married" >
                                    @endif
                                    <label class="form-check-label" for="inlineRadio1">married</label>

                                </div>
                            </div>
                         
                            <div class="form-group col-md-6">
                                <label for="inputState">Blood Type</label>
                                <select id="inputState" class="form-control" name='blood_type'>
                                @if(Auth::user()->blood_type)
                                <option selected disable>{{Auth::user()->blood_type}}</option>
                                @else
                                    <option selected disable>Choose...</option>
                                    @endif
                                    <option value='A+'>A+</option>
                                    <option value='A-'>A-</option>
                                    <option value='B+'>B+</option>
                                    <option value='B-'>B-</option>
                                    <option value='AB'>AB</option>
                                    <option value='O+'>O+</option>
                                    <option value='O-'>O-</option>
                                </select>
                            </div>
                           
                            </div>

                            <button type='submit' class="btn " style="background-color: #008E89; color:white;" >Update</button>
                         
                    </form>
                </div>
            </div>

            <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3"><i
                                    class="material-icons colo mr-2">Next</i>Appointment</h6>
                                    <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Clinic Name</th>
      <th scope="col">Cancel</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $i)
                          @if($i->is_cancel_user==0 && $i->is_cancel_admin==0)

    <tr>

      <td>{{$i->time_date}}</td>
      <td>{{$i->time_detail}}</td>
      <td>{{$i->clinic_name}}</td>
      <td>
      <form>
					       <a  href="{{url('delete/id/'.$i->id)}}" type="submit" class="btn btn-danger" >Cancel</a>
			             </form></td>
    </tr>
   
    @endif
                          @endforeach
   
  </tbody>
</table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3"><i
                                    class="material-icons colo mr-2">Canceled</i>Appointment</h6>
                                    <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Clinic Name</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($data as $i)
                          @if($i->is_cancel_user==1 || $i->is_cancel_admin==1)

    <tr>

      <td>{{$i->time_date}}</td>
      <td>{{$i->time_detail}}</td>
      <td>{{$i->clinic_name}}</td>
      
    </tr>
   
    @endif
                          @endforeach
   
  </tbody>
</table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

</div>
</div>
<script>
function show() {
    document.getElementById('editPic').style.display = "block";
    document.getElementById('ed').style.display = "none";
}

function show1() {
    document.getElementById('use').style.display = "block";
    document.getElementById('use1').style.display = "none";
}
function show3() {
    document.getElementById('myModal').style.display = "block";
  
}
</script>
@endsection