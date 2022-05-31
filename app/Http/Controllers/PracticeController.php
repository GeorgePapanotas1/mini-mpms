<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracticeRequest;
use App\Models\Field;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $with["fields"] = Field::all();

        return view('practice.edit', $with);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PracticeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PracticeRequest $request, ImageService $imageService)
    {
        $data = [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "website_url" => $request->input('website'),
        ];

        $practice = Practice::create($data);

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $practice->image = $imageService->storeImage($file, $practice);
            $practice->save();
        }

        $practice->fields()->sync($request->input('field_of_practice'));

        return redirect()->to(route('practice.show', $practice->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        $with["practice"] = $practice;
        $with["employees"] = $practice->employees()->paginate(10);
        return view('practice.view', $with);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Practice $practice)
    {
        $with["practice"] = $practice;
        $with["employees"] = $practice->employees()->paginate(10);
        $with["fields"] = Field::all();

        return view('practice.edit', $with);
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

        $practice->fields()->sync($request->input('field_of_practice'));

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
