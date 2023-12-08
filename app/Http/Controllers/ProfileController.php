<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function updateProfilePicture(Request $request)
    {

        $this->validate($request, [
            'profile_picture' => ['required']
        ]);

        $newName =  Str::random(30) . Carbon::now()->timestamp . '.jpeg';

        $profile = Auth::user()->profile;
        if ($profile->profile_photo != env('APP_URL') . "/assets_general/defaultProfilePic.png") {

            $storePath = str_replace(env('APP_URL') . '/storage/', '/app/public/', $profile->profile_photo);
            $storePath = storage_path($storePath);
            if (is_file($storePath)) {
                unlink($storePath);
            }
        }


        $path = $request->profile_picture->storeAs('profile-pictures', $newName, 'public');

        $profile = Auth::user()->profile;
        $profile->profile_photo = env('APP_URL') . Storage::url($path);

        if ($profile->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Profile image added successfully',
            ]);
        }
    }
}
