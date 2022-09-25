@extends('admin.master')
@section ('title', 'profile')

@section('link')
<style>
#editPic {
    display: none;
}

#cat {
    display: none;
}

#form {
    display: none;
}
.red{
    color:red;
}
.text-green{
    color:green;
}
</style>
@endsection

@section('content')

<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Clinic profile</h2>
                </div>
            </div>
        </div>


        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full ">
                    <div class="full graph_head">

                        <div class="full price_table padding_infor_info">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="white_shd full ">
                                        <div class="full graph_head" style='background: gainsboro;'>
                                            <div class="heading1 margin_0">
                                                <h2>Clinic profile</h2>
                                            </div>
                                        </div>
                                        <div class="full price_table padding_infor_info">
                                            @if (session('message'))
                                            <div class="alert alert-success mb-5 " role="alert">
                                                {{session('message')}}
                                            </div>
                                            @endif
                                            @if (session('message2'))
                                            <div class="alert alert-success mb-5 " role="alert">
                                                {{session('message2')}}
                                            </div>
                                            @endif
                                            @if (session('message3'))
                                            <div class="alert alert-success mb-5 " role="alert">
                                                {{session('message3')}}
                                            </div>
                                            @endif
                                            @if (session('message4'))
                                            <div class="alert alert-danger mb-5 " role="alert">
                                                {{session('message4')}}
                                            </div>
                                            @endif

                                            <div class="row">


                                                <!-- user profile section -->
                                                <!-- profile image -->
                                                <div class="col-lg-12">
                                                    <div class="full dis_flex center_text">
                                                        <div class="profile_img">
                                                            @if(isset($data->clinic_img))
                                                            <img width="180" class="rounded-circle"
                                                            src="{{asset('/storage/img/'.$data->clinic_img)}}"
                                                                alt="#" />
                                                                @else
                                                                <img width="180" class="rounded-circle"
                                                                src="{{asset('img/person-icon.png')}}"
                                                                alt="#" />
                                                                @endif
                                                            <div class='mt-3'>
                                                                <button id='ed' type='submit' class="btn my-3 ml-5"
                                                                    style="background-color: #008E89; color:white;"
                                                                    onclick="show()">Update</button>
                                                            </div>

                                                            <form action="/editPic" method="post"
                                                                enctype="multipart/form-data" id="editPic">
                                                                @csrf
                                                                <input type="file" name="img" required
                                                                    style="font-size:small;">
                                                                    @error('img')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                <input class="btn mb-3 mt-3 ml-5"
                                                                    style="background-color: #008E89; color:white;"
                                                                    type="submit" name="addItem" value="edit"
                                                                    style="font-size:small;">
                                                            </form>

                                                        </div>

                                                        <div class="profile_contant">
                                                            <div class="contact_inner">
                                                                <h3>{{$data->clinic_name}}</h3>

                                                            </div>
                                                            <form action="/updateClinic" method="post" class='p-3'  enctype="multipart/form-data" >
                                                                @csrf
                                                                <div class="form-row ">
                                                                    <div class="form-group col-md-6">
                                                                        <!-- Gender('Male', 'Female') -->
                                                                        <label for="inputAddress"> Clinic Name<span class='red'>*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            id="inputAddress"
                                                                            value="{{$data->clinic_name}}"
                                                                            name='clinic_name'>
                                                                        @error('clinic_name')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <!-- Gender('Male', 'Female') -->
                                                                        <label for="inputAddress"> Clinic Email <span class='red'>*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            id="inputAddress"
                                                                            value="{{$data->clinic_email}}"
                                                                            name='clinic_email'>
                                                                        @error('clinic_email')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="form-row ">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputAddress"> Clinic license <span class='red'>*</span></label>
                                                                        @if($data->clinic_license)
                                                                        <i class="fa-solid fa-check text-green"  onmouseover="show3()" onmouseout="show4()"></i>
                                                                        <div style='display:none' id='img'>
                                                                            <img  src="{{asset('/storage/img/'.$data->clinic_license)}}" alt="" height='200'>
                                                                        </div>
                                                                        @endif
                                                                        <input type="file" class="form-control"
                                                                            id="inputAddress"
                                                                            value="{{$data->clinic_license}}"
                                                                            name='clinic_license'>
                                                                        @error('clinic_license')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="form-group mb-4 ">
                                                                    <label for="inputState">Categories</label>
                                                                    <select id="inputState" class="form-control"
                                                                        name='cat_id'>
                                                                        {{$data2}}
                                                                        @if($data2)
                                                                        <option value='{{$data2->id}}'>
                                                                            {{$data2->cat_name}}</option>
                                                                        @else
                                                                        <option selected disable>Choose...</option>
                                                                        @endif
                                                                        @foreach($data5 as $a)
                                                                        <option value='{{$a->id}}'>{{$a->cat_name}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>

                                                                    <div class="form-check my-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="checkbox"
                                                                            onchange='handleChange(this);'>
                                                                        <label class="form-check-label" for="checkbox">
                                                                            Other
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-group " id='cat'>
                                                                        <label for="inputAddress"> Categories Name
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            id="inputAddress" value="" name='cat_name'>
                                                                        @error('cat_name')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputAddress2">Clinic Phone <span class='red'>*</span></label>
                                                                        <input type="number" class="form-control"
                                                                            id="inputAddress2"
                                                                            value="{{$data->clinic_phone}}"
                                                                            name='clinic_phone'>
                                                                        @error('clinic_phone')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputAddress2">Commercial
                                                                            Register <span class='red'>*</span></label>
                                                                        <input type="number" class="form-control"
                                                                            id="inputAddress2"
                                                                            value="{{$data->commercial_register}}"
                                                                            name='commercial_register'>
                                                                        @error('commercial_register')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>


                                                                </div>


                                                                <div class="form-row">

                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputAddress2">Clinic start
                                                                            time <span class='red'>*</span></label>
                                                                        <input type="time" class="form-control"
                                                                            id="inputAddress2"
                                                                            value="{{$data->time_start}}"
                                                                            name='time_start'>
                                                                        @error('time_start')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4">Clinic end
                                                                            time <span class='red'>*</span></label>
                                                                        <input type="time" class="form-control"
                                                                            id="inputPassword4" name='time_end'
                                                                            value="{{$data->time_end}}">
                                                                        @error('time_end')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>

                                                                </div>


                                                                <div class="form-row">

                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4">Clinic
                                                                            location</label>
                                                                        <input type="text" class="form-control"
                                                                            id="inputPassword4" name='clinic_location'
                                                                            value="{{$data->clinic_location}}">
                                                                        @error('clinic_location')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4">Clinic Short
                                                                            Description</label>
                                                                        <input type="text" class="form-control"
                                                                            id="inputPassword4" name='clinic_short_des'
                                                                            value="{{$data->clinic_short_des}}">
                                                                        @error('clinic_short_des')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>


                                                                </div>

                                                                <div class="form-group ">
                                                                    <label for="floatingTextarea">Clinic
                                                                        Description</label>
                                                                    <textarea class="form-control" rows="6"
                                                                        name='clinic_des'>{{$data->clinic_des}}</textarea>

                                                                    @error('clinic_des')
                                                                    <div class="alert alert-danger">{{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>



                                                                <button type='submit' class="btn  mt-3 "
                                                                    style="background-color: #008E89; color:white;">Update</button>

                                                            </form>

                                                        </div>
                                                    </div>
                                                    <!-- profile contant section -->
                                                    <div class="full inner_elements margin_top_30">
                                                        <div class="tab_style2">
                                                            <div class="tabbar">
                                                                <nav>
                                                                    <div class="nav nav-tabs" id="nav-tab"
                                                                        role="tablist">

                                                                        <a class="nav-item nav-link active"
                                                                            id="nav-home-tab" data-toggle="tab"
                                                                            href="#clinic_services" role="tab"
                                                                            aria-selected="true">
                                                                            <h6>Clinic Services</h6>
                                                                        </a>
                                                                       
                                                
                                                                        <a class="nav-item nav-link"
                                                                            id="nav-contact-tab" data-toggle="tab"
                                                                            href="#clinic_doctors" role="tab"
                                                                            aria-selected="false">
                                                                            <h6>Clinic Doctors</h6>
                                                                        </a>
                                                                    </div>
                                                                </nav>
                                                                <div class="tab-content" id="nav-tabContent">
                                                                    <div class="tab-pane fade show active" id="clinic_services"
                                                                        role="tabpanel"
                                                                        aria-labelledby="nav-home-tab">
                                                                        <div class='row '>
                                                                            <div class='col-md-10'></div>
                                                                            <div class='col-md-2 justify-content-end'>
                                                                                <button onclick="show2()"
                                                                                    class='btn btnMain '><i
                                                                                        class="fa fa-plus"></i> Add
                                                                                    Service</button></div>
                                                                        </div>
                                                                        <form method='post' action='/addService'
                                                                            class='book1 mb-5' id='form'>
                                                                            @csrf

                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="">Service name </label>
                                                                                <input type="text" id='datepicker'
                                                                                    onchange="checkDate()" required
                                                                                    name='service_name'>
                                                                                @error('service_name')
                                                                                <div class="alert alert-danger">
                                                                                    {{ $message }}</div>
                                                                                @enderror

                                                                            </div>
                                                                            <button class='btn btnMain ml-3'
                                                                                type='submit'>Add</button>
                                                                        </form>
                                                                        <table id='table'>
                                                                            <th></th>
                                                                            <th></th>
                                                                            @foreach($data3 as $b)
                                                                            <tr>

                                                                                <td>{{$b->service_name}}</td>
                                                                                <td><a href="{{url('deleteService/id/'.$b->id)}}"
                                                                                        class='btn btnDen'>Delete<a>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </table>




                                                                    </div>
                                                                    <div class="tab-pane fade" id="clinic_doctors"
                                                                        role="tabpanel"
                                                                        aria-labelledby="nav-contact-tab">
                                                                        <table>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            @foreach($data4 as $c)
                                                                            <tr>

                                                                                <td><img width="60" src="{{asset('/storage/img/'.$c->doctor_img)}}"
                                                                                        class="img-responsive rounded-circle"
                                                                                        alt="#"></td>
                                                                                <td> <span
                                                                                        class="name_user">{{$c->doctor_name}}</span>
                                                                                </td>
                                                                                <td><a href=""
                                                                                        class='btn btnMain'>Details<a>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </table>

                                                                        <p class='text-right'><a href="/doctorsAdmin"
                                                                                        class='btn btnMain'>Seel all<a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end user profile section -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



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

function show2() {
    document.getElementById('form').style.display = "block";
    document.getElementById('table').style.display = "none";
}
function show3() {
    document.getElementById('img').style.display = "block";
   
}
function show4() {
    document.getElementById('img').style.display = "none";
   
}
function handleChange(checkbox) {
    if (checkbox.checked == true) {

        document.getElementById('cat').style.display = "block";
    } else {
        document.getElementById('cat').style.display = "none";;
    }
}
</script>
@endsection