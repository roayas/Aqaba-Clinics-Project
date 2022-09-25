@extends('admin.master')
@section ('title', 'change password')

@section('link')

@endsection

@section('content')

<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Change Password</h2>
                </div>
            </div>
        </div>


        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Change Password</h2>
                        </div>
                        <div class="full price_table padding_infor_info">
                            

                        @if (session('message'))
                            <div class="alert alert-danger mb-5 " role="alert">
                                {{session('message')}}
                            </div>
                            @endif
                            @if (session('message2'))
                            <div class="alert alert-success mb-5 " role="alert">
                                {{session('message2')}}
                            </div>
                            @endif

                                <form action="/changePassword" method="post" class='p-3'>
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">

                                            <label for="inputAddress"> Current Password</label>
                                            <input type="password" class="form-control" id="inputAddress" value=""
                                                name='old_pass'>
                                            @error('old_pass')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                    </div>



                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">New Password</label>
                                            <input type="password" class="form-control" id="inputAddress2" value=""
                                                name='new_pass'>
                                            @error('new_pass')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                            @enderror
                                        </div>




                                    </div>





                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Confirm  Password</label>
                                            <input type="password" class="form-control" id="inputPassword4"
                                                name='con_pass' value="">
                                            @error('con_pass')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                            @enderror
                                        </div>



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
</div>
@endsection