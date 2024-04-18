<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, image $image, string $imageId)
    {
        $data = $request->validate([
            "image" => "required|max:2048"
        ]);

        $imageFile = $request->file("image");
        $imageName = $imageFile->getClientOriginalName();
        if ($imageFile->move("assets", $imageName)) {
            $image->where("id", $imageId)->update(["image" => $imageName]);
        }

        return to_route("profile.edit")->with("message", "image is changed successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(image $image)
    {
        //
    }
}
