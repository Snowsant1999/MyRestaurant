@extends('layout.admin')

@section('content')
    <div class="d-flex justify-content-center align-items-center bg-light" style="min-height: calc(100vh - 60px);">
        <div class="card shadow-sm p-4" style="max-width:800px; width:100%; max-height:auto; height:100%; border-radius:15px;">
            <div class="bg-body-secondary rounded-4 p-4">
                <!-- Filter Form -->
                    <form id="filterForm" method="GET" action="{{ route('adminDashboard') }}" class="mb-4">
                        @csrf
                        <div class="row g-2 align-items-end">
                            <div class="col-md-4">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="">All</option>
                                    <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
                                    <option value="reserve" {{ request('status') == 'reserve' ? 'selected' : '' }}>Reserve</option>
                                    <option value="cancel" {{ request('status') == 'cancel' ? 'selected' : '' }}>Cancel</option>
                                    <option value="complete" {{ request('status') == 'complete' ? 'selected' : '' }}>Complete</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" id="date" value="{{ request('date') }}" class="form-control">
                            </div>

                            <div class="col-md-4 d-flex gap-2">
                                <button type="submit" class="btn btn-primary flex-fill">Filter</button>
                                <a href="{{ route('adminDashboard') }}" class="btn btn-secondary flex-fill">Reset</a>
                            </div>
                        </div>
                    </form>
                @if ($reservations->isEmpty())
                    <h1 class="align-text-center text-center my-5">
                        No open reservations yet.
                    </h1>
                @else
                    <h4 class="mb-4 fw-semibold text-center">Guest User List</h4>
                    <!-- Medium and larger screens -->
                    <div class="table-responsive d-none d-sm-block">
                        <table class="table table-bordered table-striped bg-white table-sm align-middle text-center" style="font-size: 0.85rem;">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="reservationTable">
                                @include('admin.partials', ['reservations' => $reservations])
                            </tbody>
                        </table>
                    </div>

                    <!-- Small screens -->
                    <div class="d-block d-sm-none" id="reservationCards">
                        @include('admin.card', ['reservations' => $reservations])
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection