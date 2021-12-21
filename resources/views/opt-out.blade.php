@extends('layouts.app')

@section('content')
<section class="login-section-wrapper">
    <div class="container">
        <div class="login-section-outer">
            <div class="col-md-6">
                <form class="form-group opt-out-form" action="" method="post">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email here..." class="form-control">
                    <p class="message">You have successfully unsubscribed.</p>
                    <button type="submit" class="btn btn-primary">submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
