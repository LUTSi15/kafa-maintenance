@extends('../master/kafa')
@section('content')
    <div class="container px-4 pb-5">
        <!-- Heading with Back Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Parent Profile Details</h4>
            <a href="{{ route('kafa.listParents') }}" class="btn darkButton btn-sm">Back</a>
        </div>

        <!-- Profile Information -->
        <div class="card text-bg-light shadow border-0 my-3 mb-5">
            <div class="card-body">
                <p class="h6 fw-bold">PROFILE INFORMATION</p>

                <div class="row pt-3">
                    <div class="mb-3 col-4">
                        <label for="username" class="form-label fw-semibold">Username</label>
                        <p class="form-control-plaintext">{{ $guardian->user->username }}</p>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <p class="form-control-plaintext">{{ $guardian->user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parent Information -->
        <div class="card text-bg-light shadow border-0 my-3 mb-5">
            <div class="card-body">
                <p class="h6 fw-bold">PARENT INFORMATION</p>

                <div class="row pt-3">
                    <div class="mb-3 col-4">
                        <label for="occupation" class="form-label fw-semibold">Occupation</label>
                        <p class="form-control-plaintext">{{ $guardian->occupation }}</p>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="phoneNum" class="form-label fw-semibold">Phone Number</label>
                        <p class="form-control-plaintext">{{ $guardian->phoneNum }}</p>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="mb-3 col-4">
                        <label for="icNum" class="form-label fw-semibold">IC Number</label>
                        <p class="form-control-plaintext">{{ $guardian->icNum }}</p>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="address" class="form-label fw-semibold">Address</label>
                        <p class="form-control-plaintext">{{ $guardian->address }}</p>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="mb-3 col-4">
                        <label for="gender" class="form-label fw-semibold">Gender</label>
                        <p class="form-control-plaintext">{{ $guardian->gender }}</p>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="race" class="form-label fw-semibold">Race</label>
                        <p class="form-control-plaintext">{{ $guardian->race }}</p>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="mb-3 col-4">
                        <label for="age" class="form-label fw-semibold">Age</label>
                        <p class="form-control-plaintext">{{ $guardian->age }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
