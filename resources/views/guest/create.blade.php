@extends('layout.guest')

@section('content')
    <div class="d-flex justify-content-center align-items-center bg-light" style="min-height: calc(100vh - 60px);">
        <div class="card shadow-sm p-4" style="max-width: 800px; width: 100%; max-height: auto; height: 100%; border-radius: 15px;">
            <h2 class="text-center">Create Reservation</h2>
            <form action="{{ route('storeReservation') }}" method="Post" enctype="multipart/form-data">
                @csrf
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-12 col-md-6 col-lg-7">
                        <div class="mb-3">
                            <label for="date" class="form-label fw-semibold">Date</label>
                            <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label fw-semibold">Time</label>
                            <input type="time" id="time" name="time" class="form-control" value="{{ old('time') }}" required>
                        </div>
                        <div>
                            <label for="contact" class="form-label fw-semibold">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control" value="{{ old('contact') }}" placeholder="Phone or email">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-12 col-md-6 col-lg-5">
                    @if (old('meal_menu'))
                        @foreach (old('meal_menu') as $meal)
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Meal Menu</label>
                            <div id="meal_menu">
                                <input type="text" name="meal_menu[]" class="form-control my-2" placeholder="Ayam Geprek, Nasi Goreng, etc.">
                            </div>
                                <button type="button" class="btn btn-secondary btn-sm mt-1" onclick="addMealField()">Add Another Meal</button>
                            </div>
                        @endforeach
                    @else
                        <div class="mb-3">
                                <label class="form-label fw-semibold">Meal Menu</label>
                            <div id="meal_menu">
                                <input type="text" name="meal_menu[]" class="form-control my-2" placeholder="Ayam Geprek, Nasi Goreng, etc.">
                            </div>
                                <button type="button" class="btn btn-secondary btn-sm mt-1" onclick="addMealField()">Add Another Meal</button>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="note" class="form-label fw-semibold">Notes</label>
                            <textarea id="note" name="note" rows="4" class="form-control" placeholder="Special instructions..."></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Submit Reservation</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection