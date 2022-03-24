<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::query();

        if ($request->searchKeyword) {
            $countries->where('name', 'LIKE', "%$request->searchKeyword%");
        }

        $countries = $countries->orderBy('name')->paginate(10);

        return view('backend.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.country.create');
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
            'name' => 'required|max:191',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {

            $data['image'] = $request->file('image')->store('country');
        }

        Country::create($data);

        Alert::toast('Country successfully created', 'success');

        return redirect()->route('admin.country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('backend.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {

            if (Storage::exists($country->image)) {
                Storage::delete($country->image);
            }

            $data['image'] = $request->file('image')->store('country');
        }

        $country->update($data);

        Alert::toast('Country successfully updated', 'success');

        return redirect()->route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        if (Storage::exists($country->image)) {
            Storage::delete($country->image);
        }

        $country->delete();

        Alert::toast('Country successfully deleted', 'success');

        return redirect()->route('admin.country.index');
    }
}
