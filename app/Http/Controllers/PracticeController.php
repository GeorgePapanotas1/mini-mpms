<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracticeRequest;
use App\Models\Practice;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        return view('practice.view', ["practice" => $practice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice)
    {
        return view('practice.edit', ["practice" => $practice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PracticeRequest $request, ImageService $imageService, Practice $practice)
    {
        $data = [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "website_url" => $request->input('website'),
        ];

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $data["image"] = $imageService->storeImage($file, $practice);
        }

        $practice->update($data);

        return redirect()->to(route('practice.show', $practice->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Practice $practice)
    {
        $practice->delete();
        return redirect()->to(route('dashboard'));
    }
}
