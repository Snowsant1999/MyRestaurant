@extends('layout.supervisor')

@section('content')
    <div class="d-flex justify-content-center align-items-center bg-light" style="min-height: calc(100vh - 60px);">
        <div class="card shadow-sm p-4" style="max-width: 800px; width: 100%; max-height: auto; height: 100%; border-radius: 15px;">
            <h2 class="text-center">Reservation Details</h2>
            <div class="row g-4">
                <!-- Left Column -->
                <div class="col-12 col-md-6 col-lg-7">
                    <div class="mb-3">
                        <label for="date" class="form-label fw-semibold">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="{{ $details->date }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label fw-semibold">Time</label>
                        <input type="time" id="time" name="time" class="form-control" value="{{ $details->time }}" readonly>
                    </div>
                    <div>
                        <label for="contact" class="form-label fw-semibold">Contact</label>
                        <input type="text" id="contact" name="contact" class="form-control" value="{{ $details->contact }}" placeholder="Phone or email" readonly>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="mb-3">
                        <div class="form-label fw-semibold">Meal_menu</div>
                        @if ($details->meals->isEmpty())
                            <input type="text" name="meal_menu" class="form-control my-2" placeholder="No menu" value="No menu" readonly>
                        @else
                            @foreach ($details->meals as $meal)
                                <input type="text" name="meal_menu[]" class="form-control my-2" value="{{ ucfirst($meal->meal_menu) }}" readonly>
                            @endforeach
                        @endif
                    </div>
                <div class="mb-3">
                    <label for="note" class="form-label fw-semibold">Notes</label>
                    <textarea class="form-control my-1" name="note" id="note" style="resize: none; overflow: hidden" placeholder="No Notes." readonly>{{ $details->note }}</textarea>
                </div>
                <div class="col-12 text-center">
                    <a onclick="history.back()" class="btn btn-primary" style="min-width: 10vh; width: 100%;">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection