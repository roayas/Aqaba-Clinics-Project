@extends('admin.master')
@section ('title', 'userDetails')

@section('link')
<style>
.section {
    padding: 100px 0;
    position: relative;
}

.gray-bg {
    background-color: #f5f5f5;
}

img {
    max-width: 100%;
}

img {
    vertical-align: middle;
    border-style: none;
}

/* About Me 
---------------------*/
.about-text h3 {
    font-size: 45px;
    font-weight: 700;
    margin: 0 0 6px;
}

@media (max-width: 767px) {
    .about-text h3 {
        font-size: 35px;
    }
}

.about-text h6 {
    font-weight: 600;
    margin-bottom: 15px;
}

@media (max-width: 767px) {
    .about-text h6 {
        font-size: 18px;
    }
}

.about-text p {
    font-size: 18px;
    max-width: 450px;
}

.about-text p mark {
    font-weight: 600;
    color: #20247b;
}

.about-list {
    padding-top: 10px;
}

.about-list .media {
    padding: 5px 0;
}

.about-list label {
    color: #20247b;
    font-weight: 600;
    width: 88px;
    margin: 0;
    position: relative;
}

.about-list label:after {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    right: 11px;
    width: 1px;
    height: 12px;
    background: #20247b;
    -moz-transform: rotate(15deg);
    -o-transform: rotate(15deg);
    -ms-transform: rotate(15deg);
    -webkit-transform: rotate(15deg);
    transform: rotate(15deg);
    margin: auto;
    opacity: 0.5;
}

.about-list p {
    margin: 0;
    font-size: 15px;
}

@media (max-width: 991px) {
    .about-avatar {
        margin-top: 30px;
    }
}

.about-section .counter {
    padding: 22px 20px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}

.about-section .counter .count-data {
    margin-top: 10px;
    margin-bottom: 10px;
}

.about-section .counter .count {
    font-weight: 700;
    color: #20247b;
    margin: 0 0 5px;
}

.about-section .counter p {
    font-weight: 600;
    margin: 0;
}

mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}

.theme-color {
    color: #fc5356;
}

.dark-color {
    color: #20247b;
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
                    <h2>User Details</h2>
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
                            <div class="row">

                                <div class="container">
                                    <div class="counter">
                                        <div class="row mb-5">

                                            <div class="col-6 col-lg-12">
                                                <div class="count-data text-center">
                                                    <h6 class="count h2">{{$data2->time_book}}</h6>
                                                    <p class="m-0px font-w-600">Time of the appointment</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center flex-row-reverse">
                                        <div class="col-lg-6">
                                            <div class="about-text go-to">
                                                <h3 class="dark-color">{{$data->name}} {{$data->user_lname}} </h3>

                                                <div class="row about-list">
                                                    <div class="col-md-6">
                                                        <div class="media">
                                                            <label>ID Number</label>
                                                            <p>{{$data2->user_id_num}}</p>
                                                        </div>
                                                        <div class="media">
                                                            <label>Date of birth</label>
                                                            <p>{{$data->user_dob}}</p>
                                                        </div>
                                                        <div class="media">
                                                            <label>Gender</label>
                                                            <p>{{$data->gender}}</p>
                                                        </div>
                                                        <div class="media">
                                                            <label>Marital</label>
                                                            <p>{{$data->marital}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="media">
                                                            <label>E-mail</label>
                                                            <p>{{$data->email}}</p>
                                                        </div>
                                                        <div class="media">
                                                            <label>Phone</label>
                                                            <p>{{$data2->user_phone}}</p>
                                                        </div>
                                                        <div class="media">
                                                            <label>Height</label>
                                                            <p>{{$data->height}}</p>
                                                        </div>
                                                        <div class="media">
                                                            <label>Weight</label>
                                                            <p>{{$data->weight}}</p>
                                                        </div>
                                                        <div class="media">
                                                            <label>Blood Type</label>
                                                            <p>{{$data->blood_type}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="media">
                                                            <label>Note </label>
                                                            <p>{{$data2->note}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="about-avatar">
                                                @if($data->user_img)
                                                <img src="{{asset('storage/img/'.$data->user_img)}}" title="" alt="">
                                                @else
                                                <img src="{{asset('img/person-icon.png')}} " alt="Admin"
                                                    class="rounded-circle" width="150">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="text-center mt-5 col-md-12 ">
                                    <a href='/booking' class="btn btnMain " style='font-size: 15px;width: 30%;'>Back</a>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection