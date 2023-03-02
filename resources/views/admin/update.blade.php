@extends("layouts.admin")

@section("content")
    <div>
        <a href="{{ route("admin.index") }}">&laquo; Back</a>
    </div>
    <div class="login">
        <h3>Edit Card</h3>
        <form action="{{ route("admin.update") }}" method="post">
            @include("partials.crud_form_fields")
            <input type="hidden" name="id" value={{ $card->id }} />
            <button type="submit" >Submit</button>
        </form>
    </div>
@endsection