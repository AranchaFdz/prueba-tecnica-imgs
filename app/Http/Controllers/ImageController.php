<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{

    public function index()
    {
        $userImages = Image::where('id_user', Auth::id())->orderBy('created_at', 'desc')->get(['id', 'title', 'description', 'file']);
        
        return view('dashboard', ['userImages' => $userImages, 'route' => 'storage/']);
    }

    public function create()
    {
        return view('image-detail', ['editing' => false, 'image' => null, 'route' => 'create-image']);
    }

    public function show(Request $request, $id)
    {
        $image = Image::where(['id' => $id])->first(['id', 'title', 'description', 'file']);

        return view('image-detail', ['editing' => true, 'image' => $image, 'route' => 'edit-image']);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required',
                'title' => 'required|string',
                'description' => 'required|string',
            ]);

            $userId = Auth::id();
            $storedFilePath = $request->file('file')->store('public/images');
            $fileName = basename($storedFilePath);

            Image::create([
                'id_user' => $userId,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'file' => 'storage/images/' . $fileName,
                'fav' => false
            ]);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al procesar la solicitud. Detalles: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        Image::where(['id' => $id])->delete();
        return redirect()->route('dashboard');
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required',
                'title' => 'required|string',
                'description' => 'required|string',
            ]);

            $storedFilePath = $request->file('file')->store('public/images');
            $fileName = basename($storedFilePath);

            Image::where(['id' => $request->input('id')])->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'file' => 'storage/images/' . $fileName
            ]);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al procesar la solicitud. Detalles: ' . $e->getMessage());
        }
    }
}
