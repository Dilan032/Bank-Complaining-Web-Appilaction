@extends('layouts.administratorLayout')
@section('administratorContent')

<span class="fs-1">Dashbord</span>

<hr class="me-3">



<div class="row">
    <div class="col-md-8">
        <div class="p-1 border-bottom border-black border-5 rounded">
            <p class="fs-4"><b>Bank details</b></p>
            <div class="fs-5">
                {{-- <span class="badge text-bg-light px-5 problemImageMainBG">Bank id : {{ $bank->id }}</span>
                <br>   --}}
                <span class="badge text-bg-light p-2 px-5  border border-primary">{{ $bank->bank_name }}</span>
                <span class="badge text-bg-light p-2 px-5 border border-primary">{{ $bank->bank_address }}</span>
                <br> 
                <span class="badge text-bg-light p-2 px-5 border border-primary">{{ $bank->email }}</span>
                <span class="badge text-bg-light p-2 px-5 border border-primary">{{ $bank->bank_contact_num }}</span>
                <br>
            </div>
        </div>

        {{-- start new row --}}
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="p-2 bg-primary-subtle text-primary-emphasis border-bottom border-black border-5 rounded btnShado">
                    
                    <p class="fs-4">Administrators <span class="badge text-bg-light px-5 problemImageMainBG">{{ $NumAdministrators }}</span></p>
                    <div class="p-3 bg-white text-dark  rounded btnShado">
                        <div class="d-flex justify-content-between px-4 mt-2">
                            🙋‍♂️Active
                            <span class="badge text-bg-primary px-5">{{ $NumActiveAdministrators }}</span>
                        </div>
                        <div class="d-flex justify-content-between px-4 mt-2">
                            🙇‍♂️Inactive
                            <span class="badge text-bg-secondary px-5">{{ $NumInactiveAdministrators }}</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="p-2 bg-primary-subtle text-primary-emphasis border-bottom border-black border-5 rounded btnShado">
                    
                    <p class="fs-4">Users <span class="badge text-bg-light px-5 problemImageMainBG">{{  $NumUsers }}</span></p>
                    <div class="p-3 bg-white text-dark  rounded btnShado">
                        <div class="d-flex justify-content-between px-4 mt-2">
                            🙋‍♂️Active
                            <span class="badge text-bg-primary px-5">{{ $NumActiveUsers }}</span>
                        </div>
                        <div class="d-flex justify-content-between px-4 mt-2">
                            🙇‍♂️Inactive
                            <span class="badge text-bg-secondary px-5">{{ $NumInactiveUsers }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- end new row --}}

        {{-- new row --}}
        <div class="p-3 mb-2 mt-4 bg-danger-subtle text-danger-emphasis border-bottom border-black border-5 rounded btnShado">
            <p class="fs-4">Messages <span class="badge text-bg-light px-5 problemImageMainBG">{{ $NumMessages }}</span></p>
            <div class="d-flex flex-column flex-sm-row gap-3">
                
                <div class="p-1 w-100 w-sm-50 bg-white text-dark rounded btnShado rounded">
                    <b>Administrator Request</b> 
                    <div class="d-flex justify-content-between px-4 mt-2">
                        ⏳Pending
                        <span class="badge text-bg-warning px-5">{{ $NumPendingMsg }}</span>
                    </div>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        ✔Accept
                        <span class="badge text-bg-success px-5">{{ $NumAcceptMsg }}</span>
                    </div>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        ❌Rejected
                        <span class="badge text-bg-danger px-5 mb-2">{{ $NumRejectMsg }}</span>
                    </div>
                </div>

                <div class="p-1 w-100 w-sm-50 bg-white text-dark rounded btnShado rounded">
                    <b>Nanosoft Solutions (Pvt)Ltd Status</b> 
                    <div class="d-flex justify-content-between px-4 mt-2">
                        ✔solved
                        <span class="badge text-bg-success px-5">{{ $NumSolvedMsg }}</span>
                    </div>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        ❌not solved
                        <span class="badge text-bg-warning px-5">{{ $NumNotSolvedMsg }}</span>
                    </div>
                </div>

            </div>
        </div>

    {{-- first col end --}}
    </div>

    <div class="col-md-4">
        <div class="p-1 border border-primary rounded problemImageMainBG btnShado">
            <div class="p-3 mb-2 bg-white text-dark rounded btnShado">
                <img src="{{ asset('images/CompanyLogo/nanosoftSolutions Company Logo.png') }}" alt="NanosoftSolutions Logo">
                <p class="fs-5 fw-bold">Nanosoft Solutions <small>(Pvt) Ltd</small></p>

                <div class="overflow-y-scroll" style="height: 420px;">
                    
                <p>
                    අප සමගම පරිගණක මෘදුකාංග නිර්මාණය කිරීමෙහිලා විශේෂිත වූ ආයතනයකි. 
                    අප ආයතනය මගින් <br>
                    සමුපකාර තොග ගබඩා, කෝප් සිටි, කුෂුද්‍ර මුල්‍ය ආයතන
                    සදහා විශේෂයෙන් සැකසු මුදුකාංග පද්ධතින් සපයනු ලබන අතර,
                    <ul>
                        <li>වැටුප් සැකසීම්</li>
                        <li>මානව සම්පත් කළමනාකරණ</li>
                        <li>කළමනාකරණ තොරතුරු පද්ධති</li>
                        <li>ආරක්‍ෂිත කැමරා පද්ධති</li>
                        <li>වාහන නිරීක්ෂණ පද්ධති</li>
                        <li>ස්වයංක්‍රීය දුරස්ථ පාලන පද්ධති</li>
                    </ul>
                    ආදී සියලු අංශයන්ට අදාල මෘදුකාංග සහ දෘඩාංග විශ්වසනියව ලබාදීමට කටයුතු කරයි.
                </p>

                <hr>

<p class="text-center bg-primary-subtle p-1 fw-bold">Contact Details</p>
<pre>
<b>Tp</b>
@foreach ($superAdminDetails as $superAdmin )
{{ $superAdmin->user_contact_num }}
@endforeach
</pre>
<pre>
<b>Email</b>
@foreach ($superAdminDetails as $superAdmin )
{{ $superAdmin->email }}
@endforeach
</pre>

<pre>
<b>Address:</b>
No.227/A,
Gettuwana Road,
Kurunegala.
</pre>


            </div>
            </div>
        </div>
    </div>


{{-- first row end --}}
</div>



@endsection