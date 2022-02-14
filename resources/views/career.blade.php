@extends('include.master')
@section('main-container')
<section class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Career<i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Career</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('flash_message'))
                    <div class="alert {!! Session('status') !!}" role="alert">{!! Session('flash_message') !!}</div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-6 order-md-last d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Start career with us</h3>
                                <form method="POST" id="frmCareer" name="frmCareer" class="contactForm" action="{{url('/career/save')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="name">Full Name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                @if($errors->has('name'))
                                                    <span style="color:red">{{$errors->first('name')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="mobile">Mobile</label>
                                                <input type="mobile" class="form-control" name="mobile" id="mobile" placeholder="Mobile No.">
                                                @if($errors->has('mobile'))
                                                    <span style="color:red">{{$errors->first('mobile')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="email">Email Address</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                @if($errors->has('email'))
                                                    <span style="color:red">{{$errors->first('email')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="qualification">Highest Qualification</label>
                                                <select id="qualification" class="form-control" name="qualification" placeholder="Select Qualification">
                                                    <option value="">Select Qualification</option>
                                                    <option value="postgradutation">Post Gradutation</option>
                                                    <option value="graduation">Graduation</option>
                                                    <option value="diploma">Diploma</option>
                                                    <option value="10th">10th</option>
                                                    <option value="12th">12th</option>
                                                </select>
                                                @if($errors->has('qualification'))
                                                    <span style="color:red">{{$errors->first('qualification')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="experience">Experience</label>
                                                <select id="experience" class="form-control" name="experience" placeholder="Select Experience">
                                                    <option value="">Select Experience</option>
                                                    <option value="Fresher">Fresher</option>
                                                    <option value="Less then 1 year">Less then 1 year</option>
                                                    <option value="Above 1 year">Above 1 year</option>
                                                    
                                                </select>
                                                @if($errors->has('experience'))
                                                    <span style="color:red">{{$errors->first('experience')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="cv">Uploade Cv</label>
                                                <input type="file" class="form-control" placeholder="upload your cv" name="cv">
                                                @if($errors->has('cv'))
                                                    <span style="color:red">{{$errors->first('cv')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group text-right">
                                                <input type="submit" value="Submit" class="btn btn-primary" name="submit" id="btn_submit">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <span id="msg"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 order-md-last d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3>Start career with us</h3>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 d-flex align-self-stretch ftco-animate">
                                        <img src="{{url('assets/images/career.png')}}" style="height: 250px; width:100%;" class="shadow p-3 mb-5 bg-white rounded"/>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12 col-lg-12 d-flex align-self-stretch ftco-animate">
                                        <p class="mb-5">Our Main Vision is to Share the knowledge and teaching new skills. Kaksha education is mainly dedicated to its members,students and aspiring learners,and aim to make them perfect in their respective areas. Our objective is to train the students and workforce of the country in the careers of the future. For this , We’ve partnered with best management institutes and technology companies to learn how technology is working and transformng indusrties.</p>
                                    </div>
                              </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- loader -->


<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@endsection
