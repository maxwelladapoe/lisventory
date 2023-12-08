<?php

namespace App\Http\Controllers;

use App\Mail\InviteCreated;
use App\Models\Team;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TeamController extends Controller
{



    public function show()
    {
        return response()->json([
            'success' => true,
            'message' => 'Team fetched',
            'team' => Auth::user()->team,
        ]);
    }


    public function update(Request $request)
    {
        //
        $this->validate($request, [
            "name" => ['required', 'string', 'max:255']
        ]);



        if ($this->userTeamId) {
            $team = Team::where('id', $this->userTeamId);
        } else {
            $team = new Team();
        }
        $team->name = $request->name;
        $team->email = $request->email;
        $team->website = $request->website;
        $team->mobile_no = $request->mobile_no;
        $team->location = $request->location;
        $team->address = $request->address;
        $team->country_of_operation = $request->country_of_operation;

        if ($team->save()) {

            if (!$this->userTeamId) {
                $user = User::find(Auth::user()->id);
                $user->team_id = $team->id;
                $user->save();
            }

            return response()->json([
                'success' => true,
                'message' => "team details updated successfully",
                'team' => $team
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }


    public function viewMembers()
    {

        $teamStaff = Team::latest()->where('team_id', $this->userTeamId);
        $invites = Invite::latest()->where('team_id', $this->userTeamId);
    }

    public function invite(Request $request)
    {

        $this->validate($request, [
            "invites" => ['required', 'array', 'max:5'],
            "invites.*.email" => ['required', 'email', 'unique:users,email', 'unique:invites,email'],
            "invites.*.role" => ['required', 'string'],
        ]);

        // $errors =[];

        foreach ($request->invites as $invite) {
            $newInvite = new Invite();

            do {
                //generate a random string using Laravel's str_random helper
                $token = Str::random();
            } //check if the token already exists and if it does, try again
            while (Invite::where('token', $token)->first());


            $newInvite->email = $invite['email'];
            $newInvite->role = $invite['role'];
            $newInvite->user_id = $this->userId;
            $newInvite->team_id = $this->userTeamId;
            $newInvite->token = $token;
            $newInvite->save();

            Mail::to($request->get('email'))->send(new InviteCreated($newInvite));
        }

        $invites = Invite::latest()->where('team_id', $this->userTeamId);

        return response()->json([
            'success' => true,
            'message' => 'Invite sent',
            'invites' => $invites,
        ]);
    }
}
