@extends('layouts.userLayout')
@section('userContent')

        <section class="text-center mb-5">
                <span class="fs-1">Hello Amal,</span> <br>
                <span class="font-monospace">Welcome to Bank complaining Web Application</span>
        </section>

        @include('components.user.emailForm')
        <hr class="my-5">

        <div class="row">
                <h3 class="mb-4 text-center">Previous messages</h3>
                @include('components.user.previousMessages')
        </div>
    
@endsection