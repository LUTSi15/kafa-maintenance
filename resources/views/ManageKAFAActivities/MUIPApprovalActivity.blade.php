@extends('../master/muip')
@section('content')
    <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('muip.approveActivity') }}" method="GET" class="d-flex">
            <!-- Search Input -->
            <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Search"
                value="{{ request('search') }}" />
            <!-- Search Button -->
            <button type="submit" class="btn btn-primary text-white btn-sm mx-3">Search</button>
        </form>
    </div>

    <!-- Table of Activities -->
    <form method="POST" action="{{ route('muip.batchActionActivities') }}">
        @csrf
        <table class="table table-success rounded-4 w-100">
            <thead class="table-secondary">
                <tr>
                    <!-- Column for Checkbox -->
                    <th scope="col" class="text-center" style="width: 50px;">
                        <input type="checkbox" id="selectAll" onclick="toggleAllCheckboxes(this)">
                    </th>
                    <!-- Column for Activity -->
                    <th scope="col" class="text-start px-5">Activity</th>
                    <!-- Column for Status -->
                    <th scope="col" class="text-center col-2" style="">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through Activities -->
                @forelse ($activities as $activity)
                    <tr>
                        <!-- Checkbox for selecting the activity -->
                        <td class="text-center">
                            <input type="checkbox" name="activity_ids[]" value="{{ $activity->id }}"
                                class="activity-checkbox">
                        </td>
                        <!-- Display Activity Name -->
                        <td class="px-5">{{ $activity->activityName }}</td>
                        <td class="text-center">
                            <span class="text-primary">Pending Approval</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No activities found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-end gap-3 m-4">
            <!-- Approve Button -->
            <button type="submit" name="action" value="approve" class="btn btn-primary text-white">
                <i class="fas fa-check"></i> Approve Selected
            </button>
            <!-- Reject Button -->
            <button type="submit" name="action" value="reject" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to reject the selected activities?')">
                <i class="fas fa-times"></i> Reject Selected
            </button>
        </div>
    </form>
@endsection
