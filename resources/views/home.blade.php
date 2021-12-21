@extends('layouts.app')

@section('content')
<section class="">
    <div class="container">
        <table class="work-table table table-striped">
            <thead class="login-section-wrapper text-light">
                <tr>
                    <th style="width: 150px;">FILL</th>
                    <th>NAME</th>
                    <th style="min-width: 100px;">LAST</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>SUBJECT</th>
                    <th>MESSAGE</th>
                    <th class="text-center" style="width: 100px;">NEXT</th>
                    <th>❌</th>
                    <th class="text-light text-end" style="min-width: 400px;">
                        <a href="{{route('home')}}" class="text-light text-decoration-none mx-2" href="">WORK</a> |
                        <a href="{{route('settings.index')}}" class="text-light text-decoration-none mx-2">SETTINGS</a> |
                        <a href="" class="text-light text-decoration-none mx-2">PASSWORD</a> |
                        <a class="text-light text-decoration-none mx-2" style="margin-left: 20px" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form-1').submit();">
                            {{ __('LOGOUT') }}
                        </a>
                        <form id="logout-form-1" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ABC</td>
                    <td>John</td>
                    <td>10-13-2021</td>
                    <td>john@gmail.com</td>
                    <td>1234567890</td>
                    <td>Mail</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit....</td>
                    <td class="text-center"><a class="text-decoration-none" href="">Next</a></td>
                    <td ><a class="text-decoration-none" href="" onclick="return confirm('Are you sure?')">❌</a></td>
                    <td>
                        {{-- Blank For Last th (WORK, SETTINGS, PASSWORD, LOGOUT) --}}
                    </td>
                </tr>
                <tr>
                    <td>ABC</td>
                    <td>John</td>
                    <td>10-13-2021</td>
                    <td>john@gmail.com</td>
                    <td>1234567890</td>
                    <td>Mail</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit....</td>
                    <td class="text-center"><a class="text-decoration-none" href="">Next</a></td>
                    <td ><a class="text-decoration-none" href="" onclick="return confirm('Are you sure?')">❌</a></td>
                    <td>
                        {{-- Blank For Last th (WORK, SETTINGS, PASSWORD, LOGOUT) --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="website-iframe-wrapper pt-5">
        <iframe width="100%" height="400px" src="http://great-times.co.uk/contact-us/" title="description"></iframe>
    </div>
</section>
@endsection
