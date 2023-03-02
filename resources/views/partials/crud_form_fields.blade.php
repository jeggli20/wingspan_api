<?php 
use App\Card;

$card = isset($card) ? $card : new Card; 
?>
<label for="name">Name:</label>
<input id="name" name="name" type="text" placeholder="Common Raven" value="{{ $card->name }}" />
<label for="scientific_name">Scientific Name:</label>
<input id="scientific_name" name="scientific_name" type="text" placeholder="Corvus Corax" value="{{ $card->scientific_name }}" />
<label for="habitat_type">Habitat Type:</label>
<select id="habitat_type" name="habitat_type">
    <option value="single" {{ $card->habitat_type === "single" ? "selected" : "" }}>Single</option>
    <option value="multi" {{ $card->habitat_type === "single" ? "" : "selected" }}>Multi</option>
</select>
<label for="food_count">Food Count:</label>
<input id="food_count" name="food_count" type="number" placeholder="3" value="{{ $card->food_count }}" />
<label for="points">Points:</label>
<input id="points" name="points" type="number" placeholder="5" value="{{ $card->points }}" />
<label for="nest_type">Nest Type:</label>
<select id="nest_type" name="nest_type">
    <option value="bowl" {{ $card->nest_type === "bowl" ? "" : "selected" }}>Bowl</option>
    <option value="cavity" {{ $card->nest_type === "cavity" ? "" : "selected" }}>Cavity</option>
    <option value="ground" {{ $card->nest_type === "ground" ? "" : "selected" }}>Ground</option>
    <option value="platform" {{ $card->nest_type === "platform" || !isset($card->nest_type) ? "selected" : "" }}>Platform</option>
    <option value="star" {{ $card->nest_type === "star" ? "selected" : "" }}>Star</option>
</select>
<label for="egg_count">Egg Count:</label>
<input id="egg_count" name="egg_count" type="number" placeholder="2" value="{{ $card->egg_count }}" />
<label for="wingspan">Wingspan:</label>
<input id="wingspan" name="wingspan" type="number" placeholder="135" value="{{ $card->wingspan }}" />
<label for="power_type">Power Type:</label>
<select id="power_type" name="power_type">
    <option value="Once Between Turns" {{ $card->power_type === "Once Between Turns" ? "selected" : "" }}>Once Between Turns</option>
    <option value="When Activated" {{ $card->power_type === "When Activated" || !isset($card->power_type) ? "selected" : "" }}>When Activated</option>
    <option value="When Played" {{ $card->power_type === "When Played" ? "selected" : "" }}>When Played</option>
</select>
<label for="power">Power:</label>
<input id="power" name="power" type="text" placeholder="Discard 1 egg..." value="{{ $card->power }}" />
<label for="habitat_continent_type">Habitat Continent Type:</label>
<select id="habitat_continent_type" name="habitat_continent_type">
    <option value="single" {{ $card->habitat_continent_type === "single" ? "selected" : "" }}>Single</option>
    <option value="multi" {{ $card->habitat_continent_type === "single" ? "" : "selected" }}>Multi</option>
</select>
{{ csrf_field() }}