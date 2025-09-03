
@if ($reservations->isEmpty())
    <tr>
        <td colspan="4" class="text-center py-4">No reservations found.</td>
    </tr>
@else
    @foreach ($reservations as $rs)
        <tr>
            <td class="text-center fw-semibold">{{ $rs->date }}</td>
            <td class="text-center">{{ \Carbon\Carbon::parse($rs->time)->format('H:i') }}</td>
            <td class="text-center">
                @if($rs->status === 'open')
                    <span class="badge bg-success px-3 py-2">{{ ucfirst($rs->status) }}</span>
                @elseif($rs->status === 'reserve')
                    <span class="badge bg-warning px-3 py-2">{{ ucfirst($rs->status) }}</span>
                @elseif($rs->status === 'cancel')
                    <span class="badge bg-danger px-3 py-2">{{ ucfirst($rs->status) }}</span>
                @else
                    <span class="badge bg-success px-3 py-2">{{ ucfirst($rs->status) }}</span>
                @endif
            </td>
            <td class="text-center">
                <a href="{{ route('detailReservation', $rs->id) }}" class="btn btn-primary btn-sm">Details</a>
            </td>
        </tr>
    @endforeach
@endif