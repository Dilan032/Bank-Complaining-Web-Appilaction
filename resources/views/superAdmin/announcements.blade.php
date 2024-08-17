@extends('layouts.superAdminLayout')
@section('SuperAdminContent')

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
            <section  class="bg-primary-subtle text-dark rounded p-3 messageBG">
            <h3 class="mb-5 text-center fw-bold">Write a message to send <small class="font-monospace">(via Email) </small></h3>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="hidden" name="bank_id" value="">

                    <select class="form-select mb-3 messageBG" aria-label="Default select example">
                        <option value="1">To : All Bank Employees</option>
                        <option value="2">To : All Bank Administrators</option>
                    </select>

                    <div class="form-floating mb-3 messageBG">
                        <input type="text" name="subject" value="{{old('subject')}}" class="form-control" id="floatingInput" placeholder="Subject">
                        <label for="floatingInput">Subject</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control messageBG" name="message" value="{{old('message')}}" placeholder="Message" id="floatingTextarea2" style="height: 250px"></textarea>
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