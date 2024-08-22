{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.userLayout')
@section('userContent')

<hr class="me-3">

<div id="particles-js"></div>

    <!-- Display validation errors -->
    @if ($errors->updatePassword->any())
        @foreach ($errors->updatePassword->all() as $error)
                <script>
                    Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "{{ $error }}",
                    });
                </script>
        @endforeach
    @endif

    @if (session('status'))
    <script>
        Swal.fire({
        icon: "success",
        title: "{{ session('status') }}",
        showConfirmButton: false,
        timer: 3000
        });
    </script>
    @endif

<div class="row d-flex justify-content-center">
    <div class="col-md-8 bg-primary-subtle messageBG rounded py-4 px-4">
        <h1 class="mb-4">Profile</h1>
        <div class="bg-white py-3 px-5 messageBG rounded">
            @include('profile.partials.update-password-form')
        </div>
    </div>
</div>

@endsection