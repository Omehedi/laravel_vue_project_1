<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class ProfileImageController extends Controller
{
    public function upload(Request $request){
        $request->$this->validate([
            'image' => 'required|images|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->file('images')){
            $path = $request->file('image')->store('profile_images', 'public');

            $userProfile = UserProfile::where('user_id', auth()->id())->first();

            if($userProfile){
                $userProfile->update(['profile_image' => $path]);
            }
            else{
                UserProfile::create([
                   'user_id' => auth()->id(),
                    'profile_image' => $path
                ]);
            }
            return response()->json(['path' => $path], 200);
        }
        return response()->json(['message' => 'image upload failed', 500]);
    }
}
