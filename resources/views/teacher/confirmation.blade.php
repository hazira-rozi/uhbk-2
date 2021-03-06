@extends('...layouts.landing')

@section('content')
    <div class="container">
        <div class="row">
            <br/>
        </div>
        <div class="row">

            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Konfirmasi Akun - {{Auth::User()->fullname}}  </div>
                    <div class="panel-body">
                        <span class="panel-title"><a href="logout">Logout</a></span>
                        <form name="myForm" class="form-horizontal" role="form" method="POST" action="{{ url('/teacher-conf') }}" enctype="multipart/form-data" files="true">
                            {{ csrf_field() }}

                            <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <input id="name" type="hidden" class="form-control" name="name" value="{{Auth::User()->name}}" required autofocus placeholder="Username">

                            </div>
                            @if ($errors->has('name'))
                                <span class="text-danger text-center">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                            <br/>

                            <div class="input-group{{ $errors->has('fullname') ? ' has-error' : '' }}">

                                <input id="fullname" type="hidden" class="form-control" name="fullname" value="{{Auth::User()->fullname}}" required autofocus placeholder="Fullname">


                            </div>
                            @if ($errors->has('fullname'))
                                <span class="text-danger text-center">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
                            @endif
                            <br/>

                            <div class="input-group{{ $errors->has('token') ? ' has-error' : '' }}">
                                <input id="token" type="text" class="form-control" name="token" value="{{ old('token') }}" required autofocus placeholder="Token" >
                                <span class="input-group-addon"><strong><span class="text-danger">Required</span></strong></span>

                            </div>
                            @if ($errors->has('token'))
                                <span class="text-danger text-center">
                                <strong>{{ $errors->first('token') }}</strong>
                            </span>
                            @endif
                            <br/>




                            <div class="input-group{{ $errors->has('matapelajaran') ? ' has-error' : '' }}">
                                <input id="class" type="text" class="form-control" name="matapelajaran" value="{{ old('matapelajaran') }}" required autofocus placeholder="Mata Pelajatan" >
                                <span class="input-group-addon"><strong><span class="text-danger">Required</span></strong></span>

                            </div>
                            @if ($errors->has('matapelajaran'))
                                <span class="text-danger text-center">
                                <strong>{{ $errors->first('matapelajaran') }}</strong>
                            </span>
                            @endif
                            <br/>



                            <div class="input-group">

                                <input id="thumbnail" class="form-control" type="text" name="image" value="{{Auth::User()->image}}" required>
                                <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
