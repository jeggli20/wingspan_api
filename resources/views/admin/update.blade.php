@extends("layouts.admin")

@section("content")
    <div>
        <a href="{{ route("admin.index") }}">&laquo; Back</a>
    </div>
    @include("partials.crud_form_fields")
@endsection