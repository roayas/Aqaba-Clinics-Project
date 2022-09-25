@extends('admin.master')
@section ('title', 'Doctor Details')

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

#form2 {
    display: none;
}

#form3 {
    display: none;
}

#form4 {
    display: none;
}

#form5 {
    display: none;
}

#form6 {
    display: none;
}

.red {
    color: red;
}

.text-green {
    color: green;
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
                    <h2>Doctor Details</h2>
                </div>
            </div>
        </div>


        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Doctor {{$data->doctor_name}}</h2>
                        </div>
                        <div class="full price_table padding_infor_info">
                            @if (session('message'))
                            <div class="alert alert-success mb-5 " role="alert">
                                {{session('message')}}
                            </div>
                            @endif
                            @if (session('message1'))
                            <div class="alert alert-success mb-5 " role="alert">
                                {{session('message1')}}
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
                            @if (session('message5'))
                            <div class="alert alert-success mb-5 " role="alert">
                                {{session('message5')}}
                            </div>
                            @endif
                            @if (session('message6'))
                            <div class="alert alert-success mb-5 " role="alert">
                                {{session('message6')}}
                            </div>
                            @endif
                            @if (session('message7'))
                            <div class="alert alert-danger mb-5 " role="alert">
                                {{session('message7')}}
                            </div>
                            @endif
                            @if (session('message8'))
                            <div class="alert alert-success mb-5 " role="alert">
                                {{session('message8')}}
                            </div>

                            @endif
                            @if (session('message9'))
                            <div class="alert alert-success mb-5 " role="alert">
                                {{session('message9')}}
                            </div>

                            @endif
                            @if (session('message10'))
                            <div class="alert alert-danger mb-5 " role="alert">
                                {{session('message10')}}
                            </div>

                            @endif
                            @if (session('message11'))
                            <div class="alert alert-success mb-5 " role="alert">
                                {{session('message11')}}
                            </div>
                            @endif
                            <div class="row">

                                <div class="container emp-profile">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row ">
                                                <div class="profile-img">
                                                    @if(isset($data->doctor_img))
                                                    <img width="300" src="{{asset('/storage/img/'.$data->doctor_img)}}"
                                                        alt="#" />
                                                    @else
                                                    <img width="180" class="rounded-circle"
                                                        src="{{asset('img/person-icon.png')}}" alt="#" />
                                                    @endif
                                                    <div class='mt-3 ml-5'>
                                                        <button id='ed' type='submit' class="btn my-3 ml-5"
                                                            style="background-color: #008E89; color:white;"
                                                            onclick="show()">Update</button>
                                                    </div>
                                                    <div class="file m-3">
                                                        <form action="/editPicDoc" method="post"
                                                            enctype="multipart/form-data" id="editPic" class='ml-5'>
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
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="profile-head">
                                                    <h3>
                                                        {{$data->doctor_name}}
                                                    </h3>

                                                    <p class="profile-rating"></p>
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                                href="#home" role="tab" aria-controls="home"
                                                                aria-selected="true">Main</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="Eduction-tab" data-toggle="tab"
                                                                href="#Eduction" role="tab" aria-controls="Eduction"
                                                                aria-selected="false">Eduction </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="skill-tab" data-toggle="tab"
                                                                href="#skill" role="tab" aria-controls="skill"
                                                                aria-selected="false">Skills</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="experience-tab" data-toggle="tab"
                                                                href="#experience" role="tab" aria-controls="experience"
                                                                aria-selected="false">Experience</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="tab-content profile-tab col-12" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                        aria-labelledby="home-tab">




                                                        <form action="/updatedoctor" method="post" class='p-3'
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-row ">
                                                                <input type="hidden" value="{{$data->id}}" name='id'>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputAddress"> Doctor Name<span
                                                                            class='red'>*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputAddress" value="{{$data->doctor_name}}"
                                                                        name='doctor_name'>
                                                                    @error('doctor_name')
                                                                    <div class="alert alert-danger">{{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputAddress"> Doctor Email<span
                                                                            class='red'>*</span> </label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputAddress"
                                                                        value="{{$data->doctor_email}}"
                                                                        name='doctor_email'>
                                                                    @error('doctor_email')
                                                                    <div class="alert alert-danger">{{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-row ">
                                                                <div class="form-group col-md-12">
                                                                    <!-- Gender('Male', 'Female') -->
                                                                    <label for="inputAddress"> Syndicate Membership Card
                                                                        <span class='red'>*</span></label>
                                                                    @if($data->practice_certificate)
                                                                    <i class="fa-solid fa-check text-green"
                                                                        onmouseover="show5()" onmouseout="show4()"></i>
                                                                    <div style='display:none' id='img'>
                                                                        <img src="{{asset('/storage/img/'.$data->practice_certificate)}}"
                                                                            alt="" height='200'>
                                                                    </div>
                                                                    @endif
                                                                    <input type="file" class="form-control"
                                                                        id="inputAddress"
                                                                        value="{{$data->practice_certificate}}"
                                                                        name='practice_certificate'>
                                                                    @error('practice_certificate')
                                                                    <div class="alert alert-danger">{{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group mb-4 ">
                                                                <label for="inputState">Categories <span
                                                                        class='red'>*</span></label>
                                                                <select id="inputState" class="form-control"
                                                                    name='cat_id'>

                                                                    <option value='{{$data->cat_id}}'>
                                                                        {{$data->cat_name}}</option>

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

                                                            <div class="form-group ">
                                                                <label for="inputAddress2">Doctor Phone <span
                                                                        class='red'>*</span></label>
                                                                <input type="number" class="form-control"
                                                                    id="inputAddress2" value="{{$data->doctor_phone}}"
                                                                    name='doctor_phone'>
                                                                @error('doctor_phone')
                                                                <div class="alert alert-danger">{{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>



                                                            <div class="form-group ">
                                                                <label for="floatingTextarea">Description</label>
                                                                <textarea class="form-control" rows="6"
                                                                    name='doctor_des'>{{$data->doctor_des}}</textarea>

                                                                @error('doctor_des')
                                                                <div class="alert alert-danger">{{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>



                                                            <button type='submit' class="btn  mt-3 "
                                                                style="background-color: #008E89; color:white;">Update</button>

                                                        </form>

                                                    </div>
                                                    <div class="tab-pane fade " id="Eduction" role="tabpanel"
                                                        aria-labelledby="Eduction-tab">

                                                        <div class='row '>
                                                            <div class='col-md-8'></div>
                                                            <div class='col-md-2 justify-content-end'>
                                                                <button onclick="show2()" class='btn btnMain '><i
                                                                        class="fa fa-plus"></i> Add
                                                                    Eduction</button>
                                                            </div>
                                                        </div>
                                                        <form method='post' action='/addedu' class='book1 mb-5'
                                                            id='form'>
                                                            @csrf

                                                            <input type="hidden" value="{{$data->id}}" name='id'>

                                                            <div class=" mb-3">
                                                                <label for="">Eduction name </label><br>
                                                                <input type="text" id='datepicker' required
                                                                    class="form-control" name='edu_name'>
                                                                @error('edu_name')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}</div>
                                                                @enderror

                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="">Description </label><br>

                                                                <textarea class="form-control" rows="6" name='edu_des'
                                                                    required></textarea>
                                                                @error('edu_des')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}</div>
                                                                @enderror

                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="">Eduction Start </label><br>
                                                                <input type="number" min="1900" max="2099" step="1"
                                                                    value="2016" required name='edu_from'
                                                                    class="form-control">
                                                                @error('edu_from')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}</div>
                                                                @enderror

                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="">Eduction End </label><br>
                                                                <input type="number" min="1900" max="2099" step="1"
                                                                    value="2016" required name='edu_to'
                                                                    class="form-control">
                                                                @error('edu_to')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}</div>
                                                                @enderror

                                                            </div>
                                                            <button class='btn btnMain ml-3' type='submit'>Add</button>
                                                        </form>
                                                        <table id='table'>
                                                            <th id='e7'>Eduction Name</th>
                                                            <th id='e8'>Description</th>
                                                            <th id='e9'>Start Eduction</th>
                                                            <th id='e10'>End Eduction</th>
                                                            @foreach($data3 as $b)
                                                            <tr>

                                                                <td id='e1'>{{$b->edu_name}}</td>
                                                                <td id='e2'>{{$b->edu_des}}</td>
                                                                <td id='e3'>{{$b->edu_from}}</td>
                                                                <td id='e4'>{{$b->edu_to}}</td>


                                                                <td id='e5'>
                                                                    <?php
                                                                   $id = $id=$b->id;
                                                            echo "<button class='btn btnMain' onclick=show3($id) id='e{$id}'>Edit</button>"; ?>
                                                                </td>
                                                                <td id='e6'><a href="{{url('deleteedu/id/'.$b->id)}}"
                                                                        class='btn btnDen'>Delete<a>
                                                                </td>
                                                                <td style='width: 270px;'>
                                                              
                                                                    <form method='post' action='/editedu'
                                                                         id='{{$b->id}}' style='display:none'>
                                                                        @csrf

                                                                        <input type="hidden" value="{{$b->id}}"
                                                                            name='id'>

                                                                        <div class=" mb-3">
                                                                            <label for="">Eduction name </label><br>
                                                                            <input type="text" id='datepicker' required
                                                                                name='edu_name' class="form-control"
                                                                                value="{{$b->edu_name}}">
                                                                            @error('edu_name')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                            @enderror

                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <label for="">Description </label><br>

                                                                            <textarea class="form-control" rows="6"
                                                                                name='edu_des'
                                                                                required>{{$b->edu_des}}</textarea>
                                                                            @error('edu_des')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                            @enderror

                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <label for="">Eduction Start </label><br>
                                                                            <input type="number" min="1900" max="2099"
                                                                                class="form-control" step="1" required
                                                                                name='edu_from'
                                                                                value="{{$b->edu_from}}">
                                                                            @error('edu_from')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                            @enderror

                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <label for="">Eduction End </label><br>
                                                                            <input type="number" min="1900" max="2099"
                                                                                class="form-control" step="1" required
                                                                                name='edu_to' value="{{$b->edu_to}}">
                                                                            @error('edu_to')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                            @enderror

                                                                        </div>
                                                                        <button class='btn btn-inf ml-3'
                                                                            type='submit'>edit</button>
                                                                    </form>
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                        </table>




                                                    </div>

                                                    <div class="tab-pane fade" id="skill" role="tabpanel"
                                                        aria-labelledby="skill-tab">




                                                        <div class='row '>
                                                            <div class='col-md-8'></div>
                                                            <div class='col-md-2 justify-content-end'>
                                                                <button onclick="show22()" class='btn btnMain '><i
                                                                        class="fa fa-plus"></i> Add
                                                                    Skill</button>
                                                            </div>
                                                        </div>
                                                        <form method='post' action='/addskill' class='book1 mb-5'
                                                            id='form3'>
                                                            @csrf

                                                            <input type="hidden" value="{{$data->id}}" name='id'>

                                                            <div class=" mb-3">
                                                                <label for="">Skill name </label><br>
                                                                <input type="text" id='datepicker' required
                                                                    name='skill_name'>
                                                                @error('skill_name')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}</div>
                                                                @enderror

                                                            </div>



                                                            <button class='btn btnMain ml-3' type='submit'>Add</button>
                                                        </form>
                                                        <table id='table2'>
                                                            <th id='e77'></th>
                                                            <th id='e88'></th>
                                                            <th id='e99'></th>

                                                            @foreach($data2 as $c)
                                                            <tr>

                                                                <td id='e11'>{{$c->skill_name}}</td>

                                                                <td id='e55'>          <?php
                                                                  $ide=$c->id;
                                                            echo "<button class='btn btnMain' onclick=show33($ide)  >Edit</button>"; ?>
                                                                      
                                                                </td>
                                                                <td id='e66'><a href="{{url('deleteskill/id/'.$c->id)}}"
                                                                        class='btn btnDen'>Delete<a>
                                                                </td>
                                                                <td>
                                                                    <form method='post' action='/editskill'
                                                                         id='{{$c->id}}{{$c->id}}' style='display:none' >
                                                                        @csrf

                                                                        <input type="hidden" value="{{$c->id}}"
                                                                            name='id'>

                                                                        <div class=" mb-3">
                                                                            <label for="">skill name </label><br>
                                                                            <input type="text" id='datepicker' required
                                                                                name='skill_name' class="form-control"
                                                                                value="{{$c->skill_name}}">
                                                                            @error('skill_name')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                            @enderror

                                                                        </div>



                                                                        <button class='btn btn-inf ml-3'
                                                                            type='submit'>edit</button>
                                                                    </form>
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                        </table>






                                                    </div>

                                                    <div class="tab-pane fade" id="experience" role="tabpanel"
                                                        aria-labelledby="experience-tab">





                                                        <div class='row '>
                                                            <div class='col-md-8'></div>
                                                            <div class='col-md-2 justify-content-end'>
                                                                <button onclick="show222()" class='btn btnMain '><i
                                                                        class="fa fa-plus"></i> Add
                                                                    Experience</button>
                                                            </div>
                                                        </div>
                                                        <form method='post' action='/addexp' class='book1 mb-5'
                                                            id='form5'>
                                                            @csrf

                                                            <input type="hidden" value="{{$data->id}}" name='id'>

                                                            <div class="form-group mb-3">
                                                                <label for="">Experience name </label><br>
                                                                <input type="text" id='datepicker' required
                                                                    name='exp_name'>
                                                                @error('exp_name')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}</div>
                                                                @enderror

                                                            </div>



                                                            <button class='btn btnMain ml-3' type='submit'>Add</button>
                                                        </form>
                                                        <table id='table3'>
                                                            <th id='e777'></th>
                                                            <th id='e888'></th>
                                                            <th id='e999'></th>

                                                            @foreach($data4 as $d)
                                                            <tr>

                                                                <td id='e111'>{{$d->exp_name}}</td>

                                                                <td id='e555'>  <?php
                                                                  $ide=$d->id;
                                                            echo "<button class='btn btnMain' onclick=show333($ide)  >Edit</button>"; ?>
                                                                </td>
                                                                <td id='e666'><a href="{{url('deleteexp/id/'.$d->id)}}"
                                                                        class='btn btnDen'>Delete<a>
                                                                </td>
                                                                <td>
                                                                    <form method='post' action='/editexp'
                                                                        class=' ' id='{{$d->id}}{{$d->id}}{{$d->id}}' style='display:none'>
                                                                        @csrf

                                                                        <input type="hidden" value="{{$d->id}}"
                                                                            name='id'>

                                                                        <div class="form-group mb-3">
                                                                            <label for="">Experience name </label><br>
                                                                            <input type="text" id='datepicker' required class="form-control"
                                                                                name='exp_name'
                                                                                value="{{$d->exp_name}}">
                                                                            @error('exp_name')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
                                                                            @enderror

                                                                        </div>



                                                                        <button class='btn btn-inf ml-3'
                                                                            type='submit'>edit</button>
                                                                    </form>
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                        </table>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center mt-5 col-md-12 ">
                                            <a href='/doctorsAdmin' class="btn btnMain "
                                                style='font-size: 15px;width: 30%;'>Back</a>

                                        </div>

                                    </div>
                                    <div class="row">



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

    function handleChange(checkbox) {
        if (checkbox.checked == true) {

            document.getElementById('cat').style.display = "block";
        } else {
            document.getElementById('cat').style.display = "none";;
        }
    }

    function show2() {
        document.getElementById('form').style.display = "block";
        document.getElementById('table').style.display = "none";
    }

    function show22() {
        document.getElementById('form3').style.display = "block";
        document.getElementById('table2').style.display = "none";
    }

    function show222() {
        document.getElementById('form5').style.display = "block";
        document.getElementById('table3').style.display = "none";
    }

    function show3(id) {
        console.log('e'+id);
        document.getElementById(id).style.display = "block";
        // document.getElementById(id).style.width = "276px";
        document.getElementById("e"+id).style.display = "none";
        // document.getElementById('e2').style.display = "none";
        // document.getElementById('e3').style.display = "none";
        // document.getElementById('e4').style.display = "none";
        // document.getElementById('e5').style.display = "none";
        // document.getElementById('e6').style.display = "none";
        // document.getElementById('e7').style.display = "none";
        // document.getElementById('e8').style.display = "none";
        // document.getElementById('e9').style.display = "none";
        // document.getElementById('e10').style.display = "none";


    }

    function show33(id) {
        console.log(id+id);
        document.getElementById( '' +id+id).style.display = "block";
        // document.getElementById(id+id).style.display = "none";
        // document.getElementById('e55').style.display = "none";
        // document.getElementById('e66').style.display = "none";



    }

    function show333(id) {

        document.getElementById(''+id+id+id).style.display = "block";
        // document.getElementById('e111').style.display = "none";
        // document.getElementById('e555').style.display = "none";
        // document.getElementById('e666').style.display = "none";



    }

    function show5() {
        document.getElementById('img').style.display = "block";

    }

    function show4() {
        document.getElementById('img').style.display = "none";

    }
    </script>
    @endsection