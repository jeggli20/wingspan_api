@extends("layouts.admin")

@section("content")
    <div>
        <a href="{{ route("admin.index") }}">&laquo; Back</a>
    </div>
    <div class="login">
        <h3>New Card</h3>
        <form action="{{ route("admin.create") }}" method="post">
            @include("partials.crud_form_fields")
            <button type="submit" >Submit</button>
        </form>
    </div>
@endsection