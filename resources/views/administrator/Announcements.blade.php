@extends('layouts.administratorLayout')
@section('administratorContent')

<span class="fs-1">Announcement</span>
<hr class="me-3">


    <!-- Display validation errors -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <section  class="bg-white text-dark rounded p-3 messageBG">
            <h3 class="mb-3 text-center fw-normal">Write a message to send to bank employees <br> <small class="font-monospace">(via Email) </small></h3>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="hidden" name="bank_id" value="">

                    <div class="form-floating mb-3">
                        <input type="text" name="subject" value="{{old('subject')}}" class="form-control" id="floatingInput" placeholder="Subject">
                        <label for="floatingInput">Subject</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" name="message" value="{{old('message')}}" placeholder="Message" id="floatingTextarea2" style="height: 250px"></textarea>
                        <label for="floatingTextarea2">Message</label>
                    </div>
            

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button class="btn btn-primary me-md-2" type="submit">Send Message</button>
                    </div>

                </form>
            </section>
        </div>
    </div>

@endsection