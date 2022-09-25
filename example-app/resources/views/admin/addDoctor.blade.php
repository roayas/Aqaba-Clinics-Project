@extends('admin.master')
@section ('title', 'Add Doctor')

@section('link')
<style>
#cat {
    display: none;
}

.red {
    color: red;
    font-weight: bold;
}

.tab {
    display: none;
}

input.invalid {
    background-color: #ffdddd;
}

.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}

.step.active {
    opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
    background-color: #04AA6D;
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
                    <h2>Add Doctor</h2>
                </div>
            </div>
        </div>


        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2></h2>
                        </div>
                        <div class="full price_table padding_infor_info">

                            <div class="row justify-content-center">


                                @if (session('message'))
                                <div class="alert alert-success mb-5 " role="alert">
                                    {{session('message')}}
                                </div>
                                @endif

                                <form action="/addedDoctor" method="post" class='p-3' style='width:80%'
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="tab"><span class='h4 text-center mb-3'> Main information</span>
                                        <div class="form-row ">
                                            <div class="form-group col-md-6">
                                                <!-- Gender('Male', 'Female') -->
                                                <label for="inputAddress"> Doctor Name <span
                                                        class='red'>*</span></label>
                                                <input type="text" class="form-control" oninput="this.className"
                                                    id="inputAddress" value="{{old('doctor_name')}}" name='doctor_name'>
                                                @error('doctor_name')
                                                <div class="alert alert-danger">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- Gender('Male', 'Female') -->
                                                <label for="inputAddress"> Doctor Email <span
                                                        class='red'>*</span></label>
                                                <input type="text" class="form-control" oninput="this.className"
                                                    id="inputAddress" value="{{old('doctor_email')}}"
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
                                                <label for="inputAddress"> Syndicate Membership Card <span
                                                        class='red'>*</span></label>
                                          
                                                <input type="file" class="form-control" id="inputAddress"
                                                    name='practice_certificate'>
                                                @error('practice_certificate')
                                                <div class="alert alert-danger">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">doctor Phone <span
                                                        class='red'>*</span></label>
                                                <input type="number" class="form-control" oninput="this.className"
                                                    id="inputAddress2" value="{{old('doctor_phone')}}"
                                                    name='doctor_phone'>
                                                @error('doctor_phone')
                                                <div class="alert alert-danger">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Doctor
                                                    Image <span class='red'>*</span></label>
                                                <input type="file" class="form-control" id="inputPassword4"
                                                    name='doctor_img' value="{{old('doctor_img')}}">
                                                @error('doctor_img')
                                                <div class="alert alert-danger">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>


                                        </div>



                                        <div class="form-group mb-4 ">
                                            <label for="inputState">Categories <span class='red'>*</span></label>
                                            <select id="inputState" class="form-control" name='cat_id'>

                                                <option selected disabled>Choose...</option>

                                                @foreach($data as $a)
                                                <option value='{{$a->id}}'>{{$a->cat_name}}
                                                </option>
                                                @endforeach
                                            </select>

                                            <div class="form-check my-3">
                                                <input class="form-check-input" type="checkbox" value="" id="checkbox"
                                                    onchange='handleChange(this);'>
                                                <label class="form-check-label" for="checkbox">
                                                    Other
                                                </label>
                                            </div>

                                            <div class="form-group " id='cat'>
                                                <label for="inputAddress"> Categories Name <span class='red'>*</span>
                                                </label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                value="{{old('cat_name')}}"   name='cat_name'>
                                                @error('cat_name')
                                                <div class="alert alert-danger">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group ">
                                            <label for="floatingTextarea">Doctor
                                                Description</label>
                                            <textarea class="form-control" rows="6" oninput="this.className"
                                                name='doctor_des'>{{old('doctor_des')}}</textarea>

                                            @error('doctor_des')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="tab"><span class='h4 text-center mb-3'> Eduction information</span>
                                        <div class=" form-group mb-3">
                                            <label for="">Eduction name <span class='red'>*</span> </label><br>
                                            <input type="text" id='datepicker' required class="form-control"
                                                name='edu_name' value="{{old('edu_name')}}">
                                            @error('edu_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class=" mb-3">
                                            <label for="">Description <span class='red'>*</span></label><br>

                                            <textarea class="form-control" rows="6" name='edu_des'
                                                required>{{old('edu_des')}}</textarea>
                                            @error('edu_des')
                                            <div class="alert alert-danger">
                                                {{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Eduction Start <span class='red'>*</span></label><br>
                                            <input type="number" min="1900" max="2099" step="1" required name='edu_from'
                                                class="form-control" value="{{old('edu_from')}}">
                                            @error('edu_from')
                                            <div class="alert alert-danger">
                                                {{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Eduction End <span class='red'>*</span> </label><br>
                                            <input type="number" min="1900" max="2099" class="form-control" step="1"
                                                name='edu_to' value="{{old('edu_to')}}">
                                            @error('edu_to')
                                            <div class="alert alert-danger">
                                                {{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="tab"><span class='h4 text-center mb-3'> Skills information</span>
                                        <div class=" mb-3">
                                            <label for="">Skill name </label><br>
                                            <input type="text" id='datepicker' class="form-control" name='skill_name'
                                                value="{{old('skill_name')}}">
                                            @error('skill_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="tab"><span class='h4 text-center mb-3'> Experience information</span>
                                        <div class="form-group mb-3">
                                            <label for="">Experience name </label><br>
                                            <input type="text" id='datepicker' class="form-control" name='exp_name'
                                                value="{{old('exp_name')}}">
                                            @error('exp_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class=' mb-5 text-center'>
                                            <button type='submit' class="btn  mt-3 "
                                                style="background-color: #008E89; color:white;width:60%">Add</button>
                                        </div>
                                    </div>
                                    <div style="overflow:auto;">
                                        <div style="float:right;">
                                            <button class=' btnMain' type="button" id="prevBtn"
                                                onclick="nextPrev(-1)">Previous</button>
                                            <button class=' btnMain' type="button" id="nextBtn"
                                                onclick="nextPrev(1)">Next</button>
                                        </div>
                                    </div>
                                    <!-- Circles which indicates the steps of the form: -->
                                    <div style="text-align:center;margin-top:40px;">
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                    </div>

                                    <!--  -->

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
<script>
function handleChange(checkbox) {
    if (checkbox.checked == true) {

        document.getElementById('cat').style.display = "block";
    } else {
        document.getElementById('cat').style.display = "none";;
    }
}
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {

        document.getElementById("nextBtn").style.display = "none";
    } else {
        document.getElementById("nextBtn").style.display = "inline";
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    //   for (i = 0; i < y.length; i++) {
    //     // If a field is empty...
    //     if (y[i].value == "") {
    //       // add an "invalid" class to the field:
    //       y[i].className += " invalid";
    //       // and set the current valid status to false
    //       valid = false;
    //     }
    //   }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}
</script>

@endsection