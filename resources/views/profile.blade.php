@extends('...layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile Info</div>

                    <div class="panel-body">
                        You are logged in!
                        Name : {{Auth::user()->name}}
                        Name : {{Auth::user()->teachertoken}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
