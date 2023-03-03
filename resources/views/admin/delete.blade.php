@extends("layouts.master")

@section("content")
    <div>
        <a href="{{ route("admin.index") }}">&laquo; Back</a>
    </div>
    <div>
        <h3>Delete {{ $card->name }}</h3>
        <p>Are you sure you want to delete {{ $card->name }}?</p>
        <a href="{{ route("admin.confirm", ["id" => $card->id]) }}">Yes</a>
        <a href="{{ route("admin.index") }}">No</a>
    </div>
@endsection