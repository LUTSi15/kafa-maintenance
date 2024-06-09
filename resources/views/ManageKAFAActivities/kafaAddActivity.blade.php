@extends('../master/kafa')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0 text-dark">New Activity</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <label for="activityName" class="col-sm-2 col-form-label text-center">Activity Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="activityName" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="venue" class="col-sm-2 col-form-label text-center">Venue</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="venue" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dateStart" class="col-sm-2 col-form-label text-center">Date</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="dateStart" value="">
                            <label for="dateEnd" class="col-sm-12 col-form-label text-center">Until</label>
                            <input type="date" class="form-control" id="dateEnd" value="">
                        </div>
                        <label for="timeStart" class="col-sm-2 col-form-label text-center">Time</label>
                        <div class="col-sm-4">
                            <input type="time" class="form-control" id="timeStart" value="">
                            <label for="timeEnd" class="col-sm-12 col-form-label text-center">Until</label>
                            <input type="time" class="form-control" id="timeEnd" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="attendees" class="col-sm-2 col-form-label text-center">Attendees</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="attendees" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="organizerName" class="col-sm-2 col-form-label text-center">People In Charge</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="organizerName" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-sm-2 col-form-label text-center">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('kafa.manageActivity') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
