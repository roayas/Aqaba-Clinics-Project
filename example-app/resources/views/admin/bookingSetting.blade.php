<?php
use Carbon\Carbon;
?>
@extends('admin.master')
@section ('title', 'Booking Setting')

@section('link')
<style>
#error {
    display: none;
    color: red;
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
                    <h2>Booking Setting</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Booking Setting</h2>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                    @if (session('message'))
                            <div class="alert alert-success mb-5 " role="alert">
                                {{session('message')}}
                            </div>
                            @endif
                        <div class="row">
                     
                            <div class="table_section padding_infor_info">
                                <div class="table-responsive-sm">
                                    <form method='post' action='/bookingSetting' class='book1 mb-5'>
                                        @csrf
                                        <div class="form-row">

                                            <div class="form-group col-md-5">
                                                <label for="inputAddress2">Clinic start
                                                    time</label>
                                                <input type="time" class="form-control" id="inputAddress2"
                                                    value="{{$data->time_start}}" name='time_start'>
                                                @error('time_start')
                                                <div class="alert alert-danger">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-5">
                                                <label for="inputPassword4">Clinic end
                                                    time</label>
                                                <input type="time" class="form-control" id="inputPassword4"
                                                    name='time_end' value="{{$data->time_end}}">
                                                @error('time_end')
                                                <div class="alert alert-danger">{{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-row my-4">
                                            <div class="form-group col-md-10 mr-1">
                                                <h5> Clinic weekend days off</h5>
                                            </div>
                                            <div class="form-group col-md-10 ">
                                                <p>Clinic weekend off first day</p>
                                                @if($data->day_1_off == 'Friday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required checked value="Friday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Friday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required value="Friday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Friday</label>
                                                </div>
                                                @endif

                                                @if($data->day_1_off == 'Saturday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required checked value="Saturday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Saturday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required  value="Saturday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Saturday</label>
                                                </div>
                                                @endif

                                                @if($data->day_1_off == 'Sunday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required checked value="Sunday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Sunday</label>
                                                </div>
                                                @else <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required value="Sunday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Sunday</label>
                                                </div>
                                                @endif

                                                @if($data->day_1_off == 'Monday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required checked value="Monday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Monday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required  value="Monday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Monday</label>
                                                </div>
                                                @endif

                                                @if($data->day_1_off == 'Tuesday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required checked value="Tuesday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Tuesday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required value="Tuesday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Tuesday</label>
                                                </div>
                                                @endif

                                                @if($data->day_1_off == 'Wednesday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required checked value="Wednesday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Wednesday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required value="Wednesday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Wednesday</label>
                                                </div>
                                                @endif 

                                                @if($data->day_1_off == 'Thursday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required checked value="Thursday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Thursday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_1_off" required value="Thursday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Thursday</label>
                                                </div>
                                                @endif

                                            </div>

                                            
                                            <div class="form-group col-md-10">
                                                <p>Clinic weekend off second day</p>
                                                @if($data->day_2_off == 'Friday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required checked value="Friday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Friday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required value="Friday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Friday</label>
                                                </div>
                                                @endif

                                                @if($data->day_2_off == 'Saturday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required checked value="Saturday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Saturday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required  value="Saturday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Saturday</label>
                                                </div>
                                                @endif

                                                @if($data->day_2_off == 'Sunday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required checked value="Sunday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Sunday</label>
                                                </div>
                                                @else <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required value="Sunday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Sunday</label>
                                                </div>
                                                @endif

                                                @if($data->day_2_off == 'Monday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required checked value="Monday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Monday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required  value="Monday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Monday</label>
                                                </div>
                                                @endif

                                                @if($data->day_2_off == 'Tuesday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required checked value="Tuesday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Tuesday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required value="Tuesday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Tuesday</label>
                                                </div>
                                                @endif

                                                @if($data->day_2_off == 'Wednesday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required checked value="Wednesday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Wednesday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required value="Wednesday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Wednesday</label>
                                                </div>
                                                @endif 

                                                @if($data->day_2_off == 'Thursday')
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required checked value="Thursday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Thursday</label>
                                                </div>
                                                @else
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input"
                                                        id="validationFormCheck2" name="day_2_off" required value="Thursday">
                                                    <label class="form-check-label" for="validationFormCheck2"
                                                        style='width: 107px;color: #1c1b38'>Thursday</label>
                                                </div>
                                                @endif

                                            </div>

                                        </div>
                                        <div class="form-row mb-5">

                                        <div class="form-group col-md-6 mb-3">
                                    <label for="formGroupExampleInput2">length of the appointment </label>
                                    <select class="custom-select"
                                        id="inputGroupSelect01" name='app_length' required>
                                        @if($data->app_length)
                                        <option   value="{{$data->app_length}}"> {{$data->app_length}} Minutes </option>
                                        <option   value="30"> 30 Minutes </option>
                                        <option   value="60"> 1 Hour </option>
                                        <option   value="90"> 1 Hour and half</option>
                                        <option   value="120"> 2 Hours </option>
                                        @else
                                        <option  selected value=""> Choose ... </option>
                                        <option   value="30"> 30 Minute </option>
                                        <option   value="60"> 1 Hour </option>
                                        <option   value="90"> 1 Hour and half</option>
                                        <option   value="120"> 2 Hours </option>
                                        @endif
                                        
                                     
                                    </select>
                                    @error('app_length')
                                                <div class="alert alert-danger">{{ $message }}
                                                </div>
                                                @enderror
                                
                                </div>
                                        </div>

                                        <div class="form-row ">

                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4" class="form-label">Add Day Date Off
                                            </label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" onchange="checkDate()"
                                                id='datepicker'  name='date'>
                                            @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <p id='error'>Date must be in the future</p>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="inputEmail4" class="form-label">Cause of the day off
                                            </label>
                                            <input type="text"
                                                class="form-control @error('title') is-invalid @enderror" 
                                                name='title' value='Example:Eid Al-Fitr'>
                                            @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="text-right mt-4">
                                            <button type='submit' class="btn btnMain "
                                                style='font-size: 15px;'>Update</button>

                                        </div>
                                    </form>

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
}</script>
    @endsection