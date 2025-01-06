@extends('../master/kafa')
@section('content')
<form method="POST" action="{{ route('kafa.storeParent') }}" class="max-w-lg mx-auto px-6 p-2 pb-4">
    @csrf

    <h2 class="fw-bold p-3 text-center">Register Parents</h2>

    <div class="grid grid-cols-1 gap-4">
        <!-- Name -->
        <div>
            <div class="form-group">
            <label for="name" class="pre-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="name"
                name="name" required>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </div>

        <!-- Username -->
        <div>
            <div class="form-group">
            <label for="username" class="pre-label">Username</label>
            <input type="text" class="form-control" id="username" placeholder="username"
                name="username" required>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>
        </div>

        <!-- Email Address -->
        <div>
            <div class="form-group">
            <label for="email" class="pre-label">Email Address</label>
            <input type="email" class="form-control" id="email" placeholder="name@kafa.com"
                name="email" required>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <!-- Role -->
        <div>
            <input type="hidden" id="role" name="role" value="guardian">
        </div>

        <!-- Password -->
        <div>
            <div class="form-group">
            <label for="password" class="pre-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Passsword"
                name="password" required>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <!-- Confirm Password -->
        <div>
            <div class="form-group">
            <label for="password_confirmation" class="pre-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" placeholder="password confirmation"
                name="password_confirmation" required>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
        <div class="col-md-12 pt-4">
            <button class="btn primaryButton text-white btn-sm w-25" type="submit">Register</button>
        </div>
    </div>

</form>
@endsection
