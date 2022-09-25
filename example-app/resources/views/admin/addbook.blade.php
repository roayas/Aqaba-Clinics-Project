<?php
use Carbon\Carbon;
?>
@extends('admin.master')
@section ('title', 'Add Book')

@section('link')
<style>
#error {
    display: none;
    color: red;
}

#cat2,
#cat1 {
    display: none;
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
                    <h2>Add an appointments</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Add an appointments</h2>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <div class="table_section padding_infor_info">
                                <div class="table-responsive-sm">
                                    <form method='post' action='/addBook1' class='book1 mb-5'>
                                        @csrf
                                        @if(session('datebook'))
                                        <div class="col-md-6 mb-3">

                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                id='datepicker' onchange="checkDate()" required name='date'
                                                value="{{session('datebook')}}">
                                            @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <p id='error'>Date must be in the future</p>
                                        </div>
                                        @else
                                        <div class="col-md-6 mb-3">
                                            <label for="inputEmail4" class="form-label">Choose the date of the
                                                appointment
                                            </label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                id='datepicker' onchange="checkDate()" required name='date'>
                                            @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <p id='error'>Date must be in the future</p>
                                        </div>
                                        @endif
                                        <div class="text-right mt-4">
                                            <button type='submit' class="btn btnMain " style='font-size: 15px;'>Check an
                                                available appointment
                                                <i class=""></i></button>

                                        </div>
                                    </form>

                                    @if(session('data1'))
                                    <form method='post' action='/addbook2'>
                                        @csrf

                                        <div class="form-check form-check-inline mr-3" style='height: 50px;'>
                                            <input type="radio" class="form-check-input" id="checkbox"
                                                onchange='handleChange(this);' name="book" required value="">
                                            <label class="form-check-label" for="validationFormCheck2"
                                                style='width: 107px;color: #1c1b38'>Break</label>
                                        </div>

                                        <div class="form-check form-check-inline mr-3" style='height: 50px;'>
                                            <input type="radio" class="form-check-input" id="checkbox2"
                                                onchange='Change(this);' name="book" required value="">
                                            <label class="form-check-label" for="validationFormCheck2"
                                                style='width: 107px;color: #1c1b38'>User Book</label>
                                        </div>

                                        <div class="col-md-6" id='cat1'>
                                            <label for="inputEmail4" class="form-label">Title
                                            </label>
                                            <input type="text"
                                                class="form-control @error('admin_add') is-invalid @enderror" required
                                                name='admin_add' value='Break'>
                                            @error('admin_add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6" id='cat2'>
                                            <label for="inputState">User name </label>
                                            <select id="inputState" class="form-control" name='user_id'>

                                                <option selected disabled>Choose...</option>

                                                @foreach($users as $a)
                                                <option value='{{$a->user_id}}'>{{$a->user_name}} {{$a->user_lname}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p style='display:none'> {{$p= session('data1') }}</p>
                                        <p style='display:none'>{{$startTime = Carbon::parse(session('start'))}}</p>
                                        <p style='display:none'>{{$endTime = Carbon::parse(session('end'))}}</p>
                                        <p style='display:none'>{{$timeDifference = $endTime->diffInHours($startTime)}}
                                        </p>

                                        <p style='display:none'>{{$b = $startTime->format('H:i')}}}} </p>
                                        <p class="mt-5 mr-3 form-label">Choose the appointment that suits you from the
                                            available appointments of the clinic
                                        </p>

                                        @foreach($data3 as $f)

                                        @if(session('datebook')== $f->date)
                                        <div class="alert alert-danger mb-5 " role="alert">
                                            This Day is Day Off for The clinic <br>
                                            <p>{{$f->title}}</p>
                                        </div>
                                        <?php echo'
                                            <style>
                                            #form{
                                                display:none
                                            }
                                            </style>
                                            <a class="btn  btn-main text-white btn-round-full mr-3" href="/book1"><i
                                            class="icofont-simple-left mr-2"></i>Back
                                           </a>
                                           ' ?>
                                        @endif
                                        @endforeach


                                        
                    @if (Carbon::parse(session('datebook'))->format('l')==$data->day_1_off ||
                    Carbon::parse(session('datebook'))->format('l')==$data->day_2_off)
                    <div class="alert alert-danger mb-5 " role="alert">
                        This Day is The Weekend Day Off for The clinic
                    </div>
                    



                    @else
                    <p style='display:none'>{{$a=$data->iteration}}</p>
                    <p style='display:none'>{{$zz=round($timeDifference*$a)}}</p>

                    @for ($x = 0; $x < $zz; $x++) <p style='display:none'>
                                            {{$c= true}}
                                            </p>



                                            @foreach($p as $i)
                                            <p style='display:none'>{{$i->time_detail}}</p>
                                            <p style='display:none'>{{$timDetail = Carbon::parse($i->time_detail)}} roa
                                            </p>
                                            <p style='display:none'>{{$a = $timDetail->format('H:i')}} roa</p>


                                            @if($a==$b)
                                            <p style='display:none'> {{$c= false}}</p>



                                            @endif
                                            @endforeach


                                            @if($c)

                                            <div class="form-check form-check-inline mr-3" style='height: 50px;' id='form'>
                                                <input type="radio" class="form-check-input" id="validationFormCheck2"
                                                    name="time" required value="{{$b}}">
                                                <label class="form-check-label" for="validationFormCheck2"
                                                    style='width: 107px;color: #1c1b38'>{{$b}}</label>
                                            </div>

                                            @endif
                                            <p style='display:none'>{{$plus = $startTime->addMinutes($data->app_length)}}</p>
                                            <p style='display:none'>{{$b = $plus->format('H:i')}} </p>
                                            @endfor
                                            @endif
                                            <div class="text-right mt-4">
                                                <button type='submit' class="btn btnMain " style='font-size: 15px;'>Make
                                                    an appointments</button>

                                            </div>
                                    </form>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <script>
    function checkDate() {
        var selectedText = document.getElementById('datepicker').value;
        var selectedDate = new Date(selectedText);
        var now = new Date();
        document.getElementById('error').style.display = 'none';
        if (selectedDate <= now) {
            document.getElementById('error').style.display = 'block';
        }
    }

    function handleChange(checkbox) {
        document.getElementById('cat1').style.display = "none";
        if (checkbox.checked == true) {

            document.getElementById('cat1').style.display = "block";
            document.getElementById('cat2').style.display = "none";
        } else {
            document.getElementById('cat1').style.display = "none";
        }


    }

    function Change(checkbox) {
        document.getElementById('cat2').style.display = "none";;
        if (checkbox.checked == true) {

            document.getElementById('cat2').style.display = "block";
            document.getElementById('cat1').style.display = "none";
        } else {
            document.getElementById('cat2').style.display = "none";
        }


    }
    </script>
    @endsection