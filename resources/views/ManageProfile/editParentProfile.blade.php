@extends('../master/guardian')
@section('content')

    <div class="container px-4 pb-5">

        <div class="d-flex justify-content-between">
            <h4 class="fw-bold">Manage Profile</h4>
        </div>

        <!-- Profile Information -->
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="card text-bg-light shadow border-0 my-3 mb-5" id="profile">
                <div class="card-body">
                    <p class="h6 fw-bold">PROFILE INFORMATION</p>

                    <div class="row pt-3 justify-content-between">
                        <div class="mb-3 col-4">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                                value="{{ old('username', $user->username) }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
                        </div>
                    </div>

                    <div class="row pt-3 justify-content-between">
                        <div class="mb-3 col-4">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="name@gmail.com" value="{{ old('email', $user->email) }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification"
                                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="container gap-3 d-flex justify-content-start mx-2">

                    <button class="btn primaryButton text-white mb-3">
                        Save
                    </button>
                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </form>

        <!-- Edit Parent Profile -->
        <form action="{{ route('profile.guardianUpdate', $guardian->id) }}" method="post">
            @csrf
            @method('put')

            <div class="card text-bg-light shadow border-0 my-3 mb-5" id="profile">
                <div class="card-body">
                    <p class="h6 fw-bold">PARENT INFORMATION</p>

                    <div class="row pt-3 justify-content-start">
                        <div class="mb-3 col-4">
                            <label for="occupation" class="form-label fw-semibold">Occupation</label>
                            <input type="text" class="form-control" name="occupation" id="occupation"
                                placeholder="Occupation" value="{{ old('occupation', $guardian->occupation) }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('occupation')" />
                        </div>

                        <div class="mb-3 col-4">
                            <label for="phoneNum" class="form-label fw-semibold">Phone Number</label>
                            <input type="text" class="form-control" name="phoneNum" id="phoneNum"
                                placeholder="Phone Number" value="{{ old('phoneNum', $guardian->phoneNum) }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('phoneNum')" />
                        </div>
                    </div>

                    <div class="row pt-3 justify-content-start">
                        <div class="mb-3 col-4">
                            <label for="icNum" class="form-label fw-semibold">IC Number</label>
                            <input type="text" class="form-control" name="icNum" id="icNum" placeholder="IC Number"
                                value="{{ old('icNum', $guardian->icNum) }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('icNum')" />
                        </div>

                        <div class="mb-3 col-4">
                            <label for="address" class="form-label fw-semibold">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address"
                                value="{{ old('address', $guardian->address) }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>
                    </div>

                    <div class="row pt-3 justify-content-start">
                        <div class="mb-3 col-4">
                            <label for="gender" class="form-label fw-semibold">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="" disabled
                                    {{ old('gender', $guardian->gender) === null ? 'selected' : '' }}>Select Gender</option>
                                <option value="Male" {{ old('gender', $guardian->gender) === 'Male' ? 'selected' : '' }}>
                                    Male</option>
                                <option value="Female"
                                    {{ old('gender', $guardian->gender) === 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                        </div>


                        <div class="mb-3 col-4">
                            <label for="race" class="form-label fw-semibold">Race</label>
                            <select class="form-control" name="race" id="race">
                                <option value="Chinese" {{ old('race', $guardian->race) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                <option value="Malays" {{ old('race', $guardian->race) == 'Malays' ? 'selected' : '' }}>Malays</option>
                                <option value="Indians" {{ old('race', $guardian->race) == 'Indians' ? 'selected' : '' }}>Indians</option>
                                <option value="Other" {{ old('race', $guardian->race) == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('race')" />
                        </div>
                        
                    </div>

                    <div class="row pt-3 justify-content-start">
                        <div class="mb-3 col-4">
                            <label for="age" class="form-label fw-semibold">Age (Minimum 18)</label>
                            <input type="number" class="form-control" name="age" id="age" placeholder="Age"
                                value="{{ old('age', $guardian->age) }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('age')" />
                        </div>
                    </div>
                </div>
                <div class="container gap-3 d-flex justify-content-start mx-2">
                    <button class="btn primaryButton text-white mb-3">Save</button>
                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </form>


        <!-- Update Password -->
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            @method('put')
            <div class="card text-bg-light shadow border-0 my-3 mb-5" id="password">
                <div class="card-body">
                    <p class="h6 fw-bold">UPDATE PASSWORD</p>

                    <div class="row pt-3 justify-content-between">
                        <div class="mb-3 col-4">
                            <label for="update_password_current_password" class="form-label fw-semibold">Current
                                Password</label>
                            <input type="password" class="form-control" name="current_password"
                                id="update_password_current_password" placeholder="Current Password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
                    </div>

                    <div class="row pt-3 justify-content-between">
                        <div class="mb-3 col-4">
                            <label for="update_password_password" class="form-label fw-semibold">New Password</label>
                            <input type="password" class="form-control" name="password" id="update_password_password"
                                placeholder="New Password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <div class="row pt-3 justify-content-between">
                        <div class="mb-3 col-4">
                            <label for="update_password_password_confirmation" class="form-label fw-semibold">Password
                                Confirmation</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="update_password_password_confirmation" placeholder="Password Confirmation" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="container gap-3 d-flex justify-content-start mx-2">

                    <button type="submit" class="btn primaryButton text-white mb-3">
                        Save
                    </button>
                    @if (session('status') === 'password-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </form>
    </div>

@endsection
