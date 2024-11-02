<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProfileImage;

class ProfileImageController extends Controller
{
    public function upload(Request $request)
    {
        // Validate image file
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8056',
        ]);

        // Store image in 'public/profile-images' directory
        $path = $validated['image']->store('public/profile-images');

        // Save image path in the database
        $profileImage = ProfileImage::create([
            'user_id' => auth()->id(),
            'path' => $path,
        ]);

        return response()->json([
            'message' => 'Image uploaded successfully',
            'path' => Storage::url($profileImage->path),
        ], 200);
    }

    public function getProfileImage()
    {
        $profileImage = ProfileImage::where('user_id', auth()->id())->latest()->first();

        return response()->json([
            'path' => $profileImage ? Storage::url($profileImage->path) : null,
        ]);
    }
}
