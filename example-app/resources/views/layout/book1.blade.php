@extends('layout.master')
@section ('title', 'Book1')


@section('link')
<style>
#error {
    color: red;
    padding-left: 15px;
    display: none;
}
</style>
<link rel="stylesheet" href=" {{ asset('css/user.css') }} ">
@endsection


@section('content')
{{Session::get('time')}}
<div aria-label="breadcrumb" class="main-breadcrumb " style='opacity: 0;'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">Book/First Step/li>
            </ol>
          </div>

<div aria-label="breadcrumb" class="main-breadcrumb mt-5 ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Home</a></li>

        <li class="breadcrumb-item active" aria-current="page">Book/First Step</li>
    </ol>
</div>



<section class="appoinment section">
    <div class="container">
    

        @if (session('fail'))
        <div class="alert alert-danger mb-5 " role="alert">
            {{session('fail')}}
        </div>
        @endif
        @if (session('fail2'))
        <div class="alert alert-danger mb-5 " role="alert">
            {{session('fail2')}}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-4" id='book1'>
                <div class="mt-3">
                    <div class="feature-icon  ">
                        <span class="bord p-4"> 1</span> <span class="h3">First Step</span>
                    </div>
                    <div>
                        <div class="line ml-3 mt-3 "></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
                    <h2 class="mb-2 title-color">Book an appointment</h2>
                    <p class="mb-4">Choose the clinic and the date of the appointment.</p>
                    <form method='post' action='book1'>
                        @csrf
                        @if(Session::has('clinic'))
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label>Choose the date of the appointment </label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id='datepicker' onchange="checkDate()" required name='date'
                                        value="{{ Session::get('date') }}">
                                    @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <p id='error'>Date must be in the future</p>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Choose the clinic</label>
                                    <select class="custom-select @error('clinic') is-invalid @enderror"
                                        id="inputGroupSelect01" name='clinic' required>
                                        <option selected  value="{{Session::get('clinic')}}">
                                            {{Session::get('clinicName')}}</option>
                                        <!-- <option value="1">One</option> -->
                                        @foreach($data as $i)
                                        <option value="{{$i->id}}">{{$i->clinic_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('clinic')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @else


                        <div class='row'>
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label>Choose the date of the appointment </label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id='datepicker' onchange="checkDate()" required name='date'>
                                    @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <p id='error'>Date must be in the future</p>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Choose the clinic</label>
                                    <select class="custom-select @error('clinic') is-invalid @enderror"
                                        id="inputGroupSelect01" name='clinic' required>
                                        <option selected disabled value="">Choose...</option>
                                        <!-- <option value="1">One</option> -->
                                        @foreach($data as $i)
                                        <option value="{{$i->id}}">{{$i->clinic_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('clinic')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="text-end mt-4">
                            <button class="btn btn-main text-white btn-round-full">Check an available appointment
                                <i class="icofont-simple-right ml-2"></i></button>
                        </div>

                    </form>

                    <div style="text-align:center;margin-top:40px;">
                        <span style=' opacity: 1' class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script>
function checkDate() {
    var selectedText = document.getElementById('datepicker').value;
    var selectedDate = new Date(selectedText);
    var now = new Date();
    document.getElementById('error').style.display = 'none';
    if (selectedDate < now) {
        document.getElementById('error').style.display = 'block';
    }
}
</script>
@endsection