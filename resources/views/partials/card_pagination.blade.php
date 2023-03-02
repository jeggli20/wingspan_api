@foreach($cards as $card)
    <div class="card">
        <h4>{{ $card->name }}</h4>
        <a href="{{ route("admin.edit", ["id" => $card->id]) }}">Update</a>
        <a href="{{ route("admin.delete") }}">Delete</a>
    </div>
    <hr />
@endforeach
<div>
    {{ $cards->links() }}
</div>