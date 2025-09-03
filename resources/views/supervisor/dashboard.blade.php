@extends('layout.supervisor')

@section('content')
    <div class="d-flex justify-content-center align-items-center bg-light" style="min-height: calc(100vh - 60px);">
        <div class="card shadow-sm p-4" style="max-width:800px; width:100%; max-height:800px; height:100%; border-radius:15px;">
            <div class="bg-body-secondary rounded-4 p-4">
                @if ($reservations->isEmpty())
                    <h1 class="align-text-center text-center my-5">
                        No Registered Guest yet.
                    </h1>
                @else
                    <h4 class="mb-4 fw-semibold text-center">Guest User List</h4>
                    <!-- Medium and larger screens -->
                    <div class="table-responsive d-none d-sm-block">
                        <table class="table table-bordered table-striped bg-white table-sm align-middle text-center" style="font-size: 0.85rem;">
                            <thead class="table-light">
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Reservation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $rs)
                                    <tr>
                                        <td class="fw-semibold">{{ $rs->name }}</td>
                                        <td>{{ $rs->email }}</td>
                                        <td>
                                            @php
                                                $pendingCount = $rs->reservations->where('status', 'open')->count();
                                            @endphp

                                            @if ($pendingCount > 0)
                                                <span class="badge bg-warning">{{ $pendingCount }} Pending...</span>
                                            @else
                                                <span class="badge bg-success">No pending reservations.</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('listReservations', $rs->id) }}" class="btn btn-primary">Show</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Small screens -->
                    <div class="d-block d-sm-none">
                        @foreach ($reservations as $rs)
                            <div class="border rounded p-2 mb-2 bg-white">
                                <div><strong>Username:</strong> {{ $rs->name }}</div>
                                <div><strong>Email:</strong> {{ $rs->email }}</div>
                                <div><strong>Reservation:</strong>
                                    @php
                                        $pendingCount = $rs->reservations->where('status', 'open')->count();
                                    @endphp

                                    @if ($pendingCount > 0)
                                        <span class="badge bg-warning">{{ $pendingCount }} Pending...</span>
                                    @else
                                        <span class="badge bg-success">No pending reservations.</span>
                                    @endif
                                </div>
                                <div class="mt-2 text-center">
                                    <a href="{{ route('listReservations', $rs->id) }}" class="btn btn-primary btn-sm" style="min-width: 30vh">Show</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection