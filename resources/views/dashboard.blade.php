@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    <div class="info info-success">
                        @if(Auth::guard('web')->check())
                            <p>You are logged in as User.</p>
                        @else
                            <p>You are logged out as User.</p>
                        @endif
                        @if(Auth::guard('admin')->check())
                            <p>You are logged in as Admin.</p>
                        @else
                            <p>You are logged out as Admin.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
