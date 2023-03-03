<?php

namespace App\Http\Controllers;

use App\User;
use App\Card;
use Auth;
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
            "habitat_type" => "required|in:single,multi",
            "food_count" => "required|integer",
            "points" => "required|integer",
            "nest_type" => "required|in:platform,bowl,cavity,ground,star",
            "egg_count" => "required|integer",
            "wingspan" => "required|integer",
            "habitat_continent_type" => "required|in:single,multi",
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
        $habitat_continent_type = $request->input("habitat_continent_type");
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
            "habitat_continent_type" => $habitat_continent_type,
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
            "habitat_type" => "required|in:single,multi",
            "food_count" => "required|integer",
            "points" => "required|integer",
            "nest_type" => "required|in:platform,bowl,cavity,ground,star",
            "egg_count" => "required|integer",
            "wingspan" => "required|integer",
            "habitat_continent_type" => "required|in:single,multi",
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
        $habitat_continent_type = $request->input("habitat_continent_type");
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
        $card->habitat_continent_type = $habitat_continent_type;
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

    public function getIndex() {
        $user = Auth::user();
        if($user) {
            return redirect()->back();
        }
        $cards = Card::orderBy("name", "asc")->paginate(5);
        return view("home.index", ["cards" => $cards]);
    }

    public function getAbout() {
        $user = Auth::user();
        if($user) {
            return redirect()->back();
        }
        return view("home.about");
    }

    public function getDetails($id) {
        $user = Auth::user();
        if($user) {
            return redirect()->back();
        }
        $card = Card::find($id);
        return view("home.details", ["card" => $card]);
    }

    public function getAdminIndex() {
        $user = Auth::user();
        if(!$user) {
            return redirect()->back();
        }
        $cards = $user->cards()->orderBy("name", "asc")->paginate(5);
        return view("admin.index", ["cards" => $cards]);
    }

    public function getAdminDetails($id) {
        $user = Auth::user();
        if(!$user) {
            return redirect()->back();
        }
        $card = Card::find($id);
        return view("admin.details", ["card" => $card]);
    }

    public function getAdminCreate() {
        $user = Auth::user();
        if(!$user) {
            return redirect()->back();
        }
        return view("admin.create");
    }

    public function getAdminUpdate($id) {
        $user = Auth::user();
        if(!$user) {
            return redirect()->back();
        }
        $card = Card::find($id);
        return view("admin.update", ["card" => $card]);
    }

    public function getAdminDelete($id) {
        $user = Auth::user();
        if(!$user) {
            return redirect()->back();
        }
        $card = Card::find($id);
        return view("admin.delete", ["card" => $card]);
    }

    public function postAdminCreate(Request $request) {
        $this->validate($request, [
            "name" => "required|string", 
            "scientific_name" => "required|string", 
            "habitat_type" => "required|in:single,multi",
            "food_count" => "required",
            "points" => "required",
            "nest_type" => "required|in:platform,bowl,cavity,ground,star",
            "egg_count" => "required",
            "wingspan" => "required",
            "habitat_continent_type" => "required|in:single,multi",
            "power_type" => "required|in:When Activated,Once Between Turns,When Played",
            "power" => "required|string"
        ]);

        $user = Auth::user();
        if(!$user) {
            return redirect()->back();
        }

        $name = $request->input("name");  
        $scientific_name = $request->input("scientific_name");  
        $habitat_type = $request->input("habitat_type"); 
        $food_count = $request->input("food_count"); 
        $points = $request->input("points"); 
        $nest_type = $request->input("nest_type"); 
        $egg_count = $request->input("egg_count"); 
        $wingspan = $request->input("wingspan"); 
        $habitat_continent_type = $request->input("habitat_continent_type");
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
            "habitat_continent_type" => $habitat_continent_type,
            "power_type" => $power_type,
            "power" => $power,
            "user_id" => $user_id,
        ]);

        if($user->cards()->save($card)) {
            $card->view_card = [
                "href" => "api/v1/card/" . $card->id,
                "method" => "GET"
            ];
            $msg = $card->name . " was created successfully";

            return view("admin.details", ["card" => $card, "msg" => $msg]);
        }

        $error_msg = "An error occurred while creating the card";

        return view("admin.details", ["error_msg" => $error_msg]);
    }

    public function postAdminUpdate(Request $request) {
        $this->validate($request, [
            "name" => "required|string", 
            "scientific_name" => "required|string", 
            "habitat_type" => "required|in:single,multi",
            "food_count" => "required|integer",
            "points" => "required|integer",
            "nest_type" => "required|in:platform,bowl,cavity,ground,star",
            "egg_count" => "required|integer",
            "wingspan" => "required|integer",
            "habitat_continent_type" => "required|in:single,multi",
            "power_type" => "required|in:When Activated,Once Between Turns,When Played",
            "power" => "required|string",
        ]);

        $user = Auth::user();
        if(!$user) {
            return redirect()->back();
        }

        $name = $request->input("name");  
        $scientific_name = $request->input("scientific_name");  
        $habitat_type = $request->input("habitat_type"); 
        $food_count = $request->input("food_count"); 
        $points = $request->input("points"); 
        $nest_type = $request->input("nest_type"); 
        $egg_count = $request->input("egg_count"); 
        $wingspan = $request->input("wingspan"); 
        $habitat_continent_type = $request->input("habitat_continent_type");
        $power_type = $request->input("power_type"); 
        $power = $request->input("power");
        $card_id = $request->input("id"); 
        $user_id = $user->id;

        $card = Card::findOrFail($card_id);

        $card->name = $name;
        $card->scientific_name = $scientific_name;
        $card->habitat_type = $habitat_type;
        $card->food_count = $food_count;
        $card->points = $points;
        $card->nest_type = $nest_type;
        $card->egg_count = $egg_count;
        $card->wingspan = $wingspan;
        $card->habitat_continent_type = $habitat_continent_type;
        $card->power_type = $power_type;
        $card->power = $power;

        if(!$card->update()) {
            $error_msg = "An error occurred while updating" . $card->name;

            return view("admin.details", ["error_msg" => $error_msg]);
        }

        $card->view_card = [
            "href" => "api/v1/card" . $card->user_id,
            "method" => "GET"
        ];

        $msg = $card->name . " was updated";

        return view("admin.details", ["card" => $card, "msg" => $msg]);
    }

    public function getAdminDeleteConfirm($id) {
        $user = Auth::user();
        if(!$user) {
            return redirect()->back();
        }
        $card = Card::findOrFail($id);

        if(!$card->delete()) {
            $error_msg = "An error occurred when deleting" . $card->name;
            return view("admin.index", ["error_msg" => $error_msg]);
        }

        $cards = Card::orderBy("name", "asc")->paginate(5);

        $msg = $card->name . " was successfully deleted";

        return view("admin.index", ["cards" => $cards, "msg" => $msg]);
    }
}
