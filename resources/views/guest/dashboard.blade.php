@extends('layout.guest')

@section('content')
    <div class="d-flex justify-content-center align-items-center bg-light" style="min-height: calc(100vh - 60px);">
        <div class="card shadow-sm p-4" style="max-width:800px; width:100%; max-height:800px; height:100%; border-radius:15px;">
            <div class="bg-body-secondary rounded-4 p-4">
                @if ($reservations->isEmpty())
                    <h1 class="align-text-center text-center my-5">
                        No reservations yet. Create one!
                    </h1>
                @else
                    <h4 class="mb-4 fw-semibold text-center">Reservation List</h4>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <!-- Medium and large screen -->
                    <div class="table-responsive d-none d-sm-block">
                        <table class="table table-bordered table-striped bg-white table-sm align-middle text-center" style="font-size: 0.85rem;">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($reservations as $rs)
                                <tbody class="align-middle">
                                    <tr>
                                        <td class="text-center fw-semibold">{{ $rs->date }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($rs->time)->format('H:i') }}</td>
                                        <td class="text-center">
                                            @if($rs->status === 'open')
                                                <span class="badge bg-success px-3 py-2">{{ ucfirst($rs->status) }}</span>
                                            @elseif($rs->status === 'reserve')
                                                <span class="badge bg-warning px-3 py-2">{{ ucfirst($rs->status) }}</span>
                                            @else
                                                <span class="badge bg-secondary px-3 py-2">{{ ucfirst($rs->status) }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="p-2 text-center">
                                                <a href="{{ route('showReservation', $rs->id) }}" class="btn btn-primary btn-sm">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>

                    <!-- Small-screen -->
                    <div class="d-block d-sm-none">
                        @foreach ($reservations as $rs)
                            <div class="border rounded p-2 mb-2 bg-white">
                                <div class="my-1"><strong>Date:</strong> {{ $rs->date }}</div>
                                <div class="my-1"><strong>Time:</strong> {{ \Carbon\Carbon::parse($rs->time)->format('H:i')}}</div>
                                <div class="my-1"><strong>Status:</strong>
                                    @if($rs->status === 'open')
                                        <span class="badge bg-success px-3 py-1">{{ ucfirst($rs->status) }}</span>
                                    @elseif($rs->status === 'reserve')
                                        <span class="badge bg-warning px-3 py-2">{{ ucfirst($rs->status) }}</span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2">{{ ucfirst($rs->status) }}</span>
                                    @endif
                                </div>
                                <div class="mt-3 mb-2 text-center">
                                    <a href="{{ route('showReservation', $rs->id) }}" class="btn btn-primary btn-sm" style="min-width: 30vh; width: auto;">Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection