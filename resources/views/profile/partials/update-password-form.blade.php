<section>

    <h2>Update Password</h2>
    <p>Ensure your account is using a long, random password to stay secure</p>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" name="current_password" id="update_password_current_password">
            @error('current_password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="update_password_password" class="form-label">New Password</label>
            <input type="password" class="form-control" name="password" id="update_password_password">
            @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="update_password_password_confirmation">
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary mb-3" type="submit">Save</button>
        </div>
    </form>
</section>
