@extends('../master/kafa')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('kafa.storeStudent') }}" class="max-w-lg mx-auto px-6 p-2 pb-4">
        @csrf

        <h2 class="fw-bold p-3 text-center">Register Student</h2>

        <div class="grid grid-cols-1 gap-4">
            <!-- Parent Name Dropdown -->
            <div>
                <div class="form-group">
                    <label for="guardian_id" class="pre-label">Parent Name</label>
                    <select id="guardian_id" name="guardian_id" class="form-control" required>
                        <option value="">Select Parent</option>
                        @foreach ($guardians as $guardian)
                            <option value="{{ $guardian->id }}">{{ $guardian->user->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('guardian_id')" class="mt-2" />
                </div>
            </div>

            <!-- IC Number -->
            <div>
                <div class="form-group">
                    <label for="icNum" class="pre-label">IC Number</label>
                    <input type="text" class="form-control" id="icNum" placeholder="IC Number" name="icNum"
                        required>
                    <x-input-error :messages="$errors->get('icNum')" class="mt-2" />
                </div>
            </div>

            <!-- Student Name -->
            <div>
                <div class="form-group">
                    <label for="studentName" class="pre-label">Student Name</label>
                    <input type="text" class="form-control" id="studentName" placeholder="Student Name"
                        name="studentName" required>
                    <x-input-error :messages="$errors->get('studentName')" class="mt-2" />
                </div>
            </div>

            <!-- Gender -->
            <div>
                <div class="form-group">
                    <label for="gender" class="pre-label">Gender</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
            </div>

            <!-- Race -->
            <div>
                <div class="form-group">
                    <label for="race" class="pre-label">Race</label>
                    <input type="text" class="form-control" id="race" placeholder="Race" name="race" required>
                    <x-input-error :messages="$errors->get('race')" class="mt-2" />
                </div>
            </div>

            <!-- Age -->
            <div>
                <div class="form-group">
                    <label for="age" class="pre-label">Age</label>
                    <input type="number" class="form-control" id="age" placeholder="Age" name="age" required>
                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                </div>
            </div>

            <!-- Birth Date -->
            <div>
                <div class="form-group">
                    <label for="birthDate" class="pre-label">Birth Date</label>
                    <input type="date" class="form-control" id="birthDate" name="birthDate" required>
                    <x-input-error :messages="$errors->get('birthDate')" class="mt-2" />
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 pt-4">
                <button class="btn primaryButton text-white btn-sm w-25" type="submit">Register</button>
            </div>
        </div>
    </form>
@endsection
