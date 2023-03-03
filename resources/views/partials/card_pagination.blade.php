<?php  ?>

@foreach($cards as $card)
    <div class="card">
        <h4>{{ $card->name }}</h4>
        @if(str_contains(url()->current(), "admin"))
            <a href="{{ route("admin.details", ["id" => $card->id]) }}">View</a>
            <a href="{{ route("admin.edit", ["id" => $card->id]) }}">Update</a>
            <a href="{{ route("admin.delete", ["id" => $card->id]) }}">Delete</a>
        @else
            <a href="{{ route("home.details", ["id" => $card->id]) }}">View</a>
        @endif
    </div>
    <hr />
@endforeach
<div>
    {{ $cards->links() }}
</div>