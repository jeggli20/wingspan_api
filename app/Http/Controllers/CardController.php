<?php

namespace App\Http\Controllers;

use App\User;
use App\Card;
use Illuminate\Http\Request;

use JWTAuth;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware("jwt.auth", ["only" => [
            "update", "store", "destroy"
        ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        foreach($cards as $card) {
            $card->view_card = [
                "href" => "api/v1/card/" . $card->id,
                "method" => "GET"
            ];
        }

        $response = [
            "msg" => "List of all cards",
            "cards" => $cards
        ];

        return response()->json($response, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string", 
            "scientific_name" => "required|string", 
            "habitat_type" => "required|in:single,multi,wild",
            "food_count" => "required|integer",
            "points" => "required|integer",
            "nest_type" => "required|in:platform,bowl,cavity,ground,star",
            "egg_count" => "required|integer",
            "wingspan" => "required|integer",
            "continent_type" => "required|in:single,multi",
            "power_type" => "required|in:When Activated,Once Between Turns,When Played",
            "power" => "required|string"
        ]);

        if(!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(["msg" => "User not found"], 403);
        }

        $name = $request->input("name");  
        $scientific_name = $request->input("scientific_name");  
        $habitat_type = $request->input("habitat_type"); 
        $food_count = $request->input("food_count"); 
        $points = $request->input("points"); 
        $nest_type = $request->input("nest_type"); 
        $egg_count = $request->input("egg_count"); 
        $wingspan = $request->input("wingspan"); 
        $continent_type = $request->input("continent_type");
        $power_type = $request->input("power_type"); 
        $power = $request->input("power"); 
        $user_id = $user->id;

        $card = new Card([
            "name" => $name,
            "scientific_name" => $scientific_name, 
            "habitat_type" => $habitat_type,
            "food_count" => $food_count,
            "points" => $points,
            "nest_type" => $nest_type,
            "egg_count" => $egg_count,
            "wingspan" => $wingspan,
            "continent_type" => $continent_type,
            "power_type" => $power_type,
            "power" => $power,
            "user_id" => $user_id,
        ]);

        $user = User::find($user_id);

        if($user->cards()->save($card)) {
            $card->view_card = [
                "href" => "api/v1/card/" . $card->id,
                "method" => "GET"
            ];
            $response = [
                "msg" => "Card was created",
                "card" => $card
            ];

            return response()->json($response, 201);
        }

        $response = ["msg" => "An error occurred when creating the card"];

        return response()->json($response, 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = Card::findOrFail($id);
        $card->view_cards = [
            "href" => "api/v1/card",
            "method" => "GET"
        ];

        $response = [
            "msg" => "Card information",
            "card" => $card
        ];

        return response()->json($response, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required|string", 
            "scientific_name" => "required|string", 
            "habitat_type" => "required|in:single,multi,wild",
            "food_count" => "required|integer",
            "points" => "required|integer",
            "nest_type" => "required|in:platform,bowl,cavity,ground,star",
            "egg_count" => "required|integer",
            "wingspan" => "required|integer",
            "continent_type" => "required|in:single,multi",
            "power_type" => "required|in:When Activated,Once Between Turns,When Played",
            "power" => "required|string",
        ]);

        if(!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(["msg" => "User not found"], 403);
        }

        $name = $request->input("name");  
        $scientific_name = $request->input("scientific_name");  
        $habitat_type = $request->input("habitat_type"); 
        $food_count = $request->input("food_count"); 
        $points = $request->input("points"); 
        $nest_type = $request->input("nest_type"); 
        $egg_count = $request->input("egg_count"); 
        $wingspan = $request->input("wingspan"); 
        $continent_type = $request->input("continent_type");
        $power_type = $request->input("power_type"); 
        $power = $request->input("power"); 
        $user_id = $user->id;

        $card = Card::findOrFail($id);

        $card->name = $name;
        $card->scientific_name = $scientific_name;
        $card->habitat_type = $habitat_type;
        $card->food_count = $food_count;
        $card->points = $points;
        $card->nest_type = $nest_type;
        $card->egg_count = $egg_count;
        $card->wingspan = $wingspan;
        $card->continent_type = $continent_type;
        $card->power_type = $power_type;
        $card->power = $power;
        $card->user_id = $user_id;

        if(!$card->update()) {
            return response()->json(["msg" => "An error occurred updating the card"], 403);
        }

        $card->view_card = [
            "href" => "api/v1/card" . $card->id,
            "method" => "GET"
        ];

        $response = [
            "msg" => "Card was updated",
            "card" => $card
        ];

        return response()->json($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::findOrFail($id);
        if(!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(["msg" => "User not found"], 403);
        }

        if(!$card->delete()) {
            return response()->json(["msg" => "An error occurred while deleting the card"]);
        }

        $response = [
            "msg" => "Card was deleted",
            "create_new_card" => [
                "href" => "api/v1/card",
                "method" => "POST",
                "params" => "title, first_aired, last_aired"
            ]
        ];

        return response()->json($response, 201);
    }
}
