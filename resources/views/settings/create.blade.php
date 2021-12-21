@extends('layouts.app')

@section('content')
    <section class="login-section-wrapper">
        <div class="container">
            <div class="setting-section-outer py-5">
                <div class="col-md-8">


                    @if (session('success_message'))
                        <div class="alert alert-success alert-dismissible text-left" role="alert">
                            {{ session('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ti-close"></i>
                            </button>
                        </div>
                    @endif

					@if (session('fail_message'))
					<div class="alert alert-danger alert-dismissible text-left" role="alert">
						{{ session('fail_message') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<i class="ti-close"></i>
						</button>
					</div>
				@endif

                    <div class="setting-section-inner d-block">

                        {!! Session::forget('success') !!}


                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <form class="form-group setting-form mb-5" method="POST"
                                    action="{{ route('settings.store') }}">
                                    @csrf
                                    <label class="setting-form-label">EMAILS PER HR</label>
                                    <div class="setting-form-inner">
                                        <input type="hidden" name="id" value="{{ $settingsData->id ?? '' }}">
                                        <input type="text" name="send_hr" value="{{ $settingsData->send_hr ?? '' }}"
                                            class="form-control">
                                        <button type="submit" class="btn btn-primary">save</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <form class="form-group setting-form mb-5" method="POST"
                                    action="{{ route('settings.store') }}">
                                    <label class="setting-form-label">SEND TO</label>
                                    @csrf
                                    <div class="setting-form-inner">
                                        <input type="hidden" name="id" value="">
                                        <input type="text" name="send_to" value="{{ $settingsData->send_to ?? '' }}"
                                            class="form-control">
                                        <button type="submit" class="btn btn-primary">save</button>
                                    </div>
                                </form>
                            </div>



                            <div class="col-md-4 col-sm-12">
                                <form class="form-group setting-form file mb-5" action="{{ route('importExcel') }}"
                                    enctype="multipart/form-data" method="POST">
                                    <label class="setting-form-label">UPLOAD URLS</label>
                                    <div class="setting-form-inner">
                                        <input type="file" required name="import_file" class="form-control"
                                            accept=".xls,.xlsx">
                                        <button type="submit" class="btn btn-primary">save</button>
                                    </div>

                                    @csrf
                                </form>

                            </div>
                        </div>



                        <div class="row pb-5">
                            <div class="col-md-12 smtp-heading">
                                <h3 class="heading">
                                    smtp settings
                                </h3>
                            </div>
                            <form class="form-group smtp-setting-form d-block" action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-2 col-sm-12">
                                        <input type="text" value="{{ $settingsData->host ?? '' }}" name="host"
                                            placeholder="host" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-2 col-sm-12">
                                        <input type="text" value="{{ $settingsData->port ?? '' }}" name="port"
                                            placeholder="port" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-2 col-sm-12">
                                        <input type="text" value="{{ $settingsData->username ?? '' }}" name="username"
                                            placeholder="username" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-2 col-sm-12">
                                        <input type="password" value="{{ $settingsData->password ?? '' }}"
                                            name="password" placeholder="password" class="form-control">
                                    </div>
                                    {{-- <div class="col-md-12 mb-2">
                                        <div class="form-group smtp-setting-form">
                                            <input type="email" value="{{ $settingsData->host_mail ?? '' }}"
                                                name="host_mail" placeholder="test-email@gmail.com"
                                                class="form-control mail">
                                            <button type="button" class="btn btn-primary send">send</button>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">save</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <form class="form-group smtp-setting-form d-block" action="{{ url('/compose-email') }}"
                            method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-12 mb-2">
                                    <div class="form-group smtp-setting-form">
                                        <input type="email" value="" name="emailAddress" placeholder="test-email@gmail.com"
                                            class="form-control mail">
                                        <button type="submit" class="btn btn-primary send">send</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12 smtp-heading">
                                <h3 class="heading">
                                    message to be send
                                </h3>
                            </div>
                            <form class="form-group smtp-setting-form d-block" action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <input type="text" name="name" value="{{ $settingsData->name ?? '' }}"
                                            placeholder="first name" class="form-control">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <input type="text" name="last_name" value="{{ $settingsData->last_name ?? '' }}"
                                            placeholder="last name" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <input type="email" name="email" value="{{ $settingsData->email ?? '' }}"
                                            placeholder="email" class="form-control">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <input type="text" name="phone" value="{{ $settingsData->phone ?? '' }}"
                                            placeholder="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 mb-2">
                                        <input type="text" name="subject" value="{{ $settingsData->subject ?? '' }}"
                                            placeholder="subject" class="form-control">
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-2">
                                        <textarea name="message" class="form-control" rows="8" cols="50"
                                            placeholder="message"> {{ $settingsData->message ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-2 text-center">
                                        <button type="submit" class="btn btn-primary">save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
