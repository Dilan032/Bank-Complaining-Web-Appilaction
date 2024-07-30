<div class="text-center mt-4">
    <span class="fs-2">Bank List</span>
</div>


<div class="px-2 mt-3 mb-4">
    <div class="p-2 mb-2 bg-black text-white rounded">
        <div class="d-flex justify-content-between">
            <div>ID | Bank Name</div>
            <div>Address</div>
            <div>View Detail</div>
        </div>
    </div>

    @foreach ($banks as $bank)
    <div class="p-3 mb-2 bg-primary-subtle text-primary-emphasis rounded">
        <div class="d-flex justify-content-between">
            <div>
                <span class="badge text-bg-dark">{{ $bank->id }}</span> {{ $bank->bank_name }}
            </div>
            <div>
                {{ $bank->bank_address }}
            </div>
            <div>
                <button class="btn btn-primary btn-sm">View</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
    
{{-- <div class="p-3 mb-2 bg-danger-subtle text-danger-emphasis rounded"> --}}