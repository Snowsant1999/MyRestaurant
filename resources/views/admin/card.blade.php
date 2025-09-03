@foreach ($reservations as $rs)
    <div class="border rounded p-2 mb-2 bg-white">
        <div><strong>Date:</strong> {{ $rs->date }}</div>
        <div><strong>Time:</strong> {{ $rs->time }}</div>
        <div><strong>Reservation:</strong>
            @if($rs->status === 'open')
                <span class="badge bg-success px-3 py-2">{{ ucfirst($rs->status) }}</span>
            @elseif($rs->status === 'reserve')
                <span class="badge bg-warning px-3 py-2">{{ ucfirst($rs->status) }}</span>
            @elseif($rs->status === 'cancel')
                <span class="badge bg-danger px-3 py-2">{{ ucfirst($rs->status) }}</span>
            @else
                <span class="badge bg-success px-3 py-2">{{ ucfirst($rs->status) }}</span>
            @endif
        </div>
        <div class="mt-2 text-center">
            <a href="{{ route('detailReservation', $rs->id) }}" class="btn btn-primary btn-sm" style="min-width: 30vh">Show</a>
        </div>
    </div>
@endforeach