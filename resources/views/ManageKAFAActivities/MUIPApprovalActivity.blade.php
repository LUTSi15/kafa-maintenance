@extends('../master/muip')
@section('content')

<div class="d-flex justify-content-end mb-3">
    <form action="{{ route('muip.approveActivity') }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Search" value="{{ request('search') }}" />
        <button type="submit" class="btn btn-primary text-white btn-sm mx-3">Search</button>
    </form>
</div>

<table class="table table-success rounded-4 w-100">
    <thead class="table-secondary">
        <tr>
            <th scope="col" class="text-start px-5">Activity</th>
            <th scope="col" class="text-center" style="width: 200px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($activities as $activity)
            <tr>
                <td class="px-5">{{ $activity->activityName }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <form method="POST" action="{{ route('muip.approveActivityAction', $activity->id) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fas fa-check" title="Approve"></i> Approve
                            </button>
                        </form>
                        <form method="POST" action="{{ route('muip.rejectActivityAction', $activity->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to reject this activity?')">
                                <i class="fas fa-times" title="Reject"></i> Reject
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center">No activities found</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
