@extends('admin.master')
@section ('title', 'booking')

@section('link')

@endsection

@section('content')

<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Price Table</h2>
                </div>
            </div>
        </div>


        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Pricing Table</h2>
                        </div>
                        <div class="full price_table padding_infor_info">
                            <div class="row">



                            
                            <form action="/updateClinic" method="post" class='p-3'>
                                                            @csrf
                                                            <div class="form-row ">
                                                                <div class="form-group col-md-6">
                                                                    <!-- Gender('Male', 'Female') -->
                                                                    <label for="inputAddress"> Clinic Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputAddress" value="" name='clinic_name'>
                                                                    @error('clinic_name')
                                                                    <div class="alert alert-danger">{{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <!-- Gender('Male', 'Female') -->
                                                                    <label for="inputAddress"> Clinic Email </label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputAddress" value="" name='clinic_email'>
                                                                    @error('clinic_email')
                                                                    <div class="alert alert-danger">{{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group mb-4 ">
                                                                <label for="inputState">Categories</label>
                                                                <select id="inputState" class="form-control"
                                                                    name='cat_id'>

                                                                    <option selected disable>Choose...</option>

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
                                                                    <label for="inputAddress2">Clinic Phone</label>
                                                                    <input type="number" class="form-control"
                                                                        id="inputAddress2" value="" name='clinic_phone'>
                                                                    @error('clinic_phone')
                                                                    <div class="alert alert-danger">{{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="inputAddress2">Commercial
                                                                        Register</label>
                                                                    <input type="number" class="form-control"
                                                                        id="inputAddress2" value=""
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
                                                                        time</label>
                                                                    <input type="time" class="form-control"
                                                                        id="inputAddress2" value="" name='time_start'>
                                                                    @error('time_start')
                                                                    <div class="alert alert-danger">{{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Clinic end
                                                                        time</label>
                                                                    <input type="time" class="form-control"
                                                                        id="inputPassword4" name='time_end' value="">
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
                                                                        value="">
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
                                                                        value="">
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
                                                                    name='clinic_des'></textarea>

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
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection