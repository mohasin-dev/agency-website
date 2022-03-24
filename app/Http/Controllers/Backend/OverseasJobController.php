<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\OverseasJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class OverseasJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $overseasJobs = OverseasJob::query();

        if ($request->searchKeyword) {
            $overseasJobs->where('country', 'LIKE', "%$request->searchKeyword%")
                ->orWhere('company_name', 'LIKE', "%$request->searchKeyword%");
        }

        $overseasJobs = $overseasJobs->orderBy('job_title')->paginate(10);

        return view('backend.overseas_job.index', compact('overseasJobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('name')->get();
        return view('backend.overseas_job.create', compact('countries'));
    }

    /**
     * Store the blog details file.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('overseas_job/details');

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
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
            'job_title' => 'required|max:191',
            'country_id' => 'required',
            'company_name' => 'required|max:191',
            'trade' => 'required|max:191',
            'visa_type' => 'required|max:191',
            'deadline' => 'date|required',
            'working_hour' => 'required|max:191',
            'contact_duration' => 'required|max:191',
            'salary' => 'required|max:191',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->all();

        if ($request->hasFile('featured_image')) {

            $data['featured_image'] = $request->file('featured_image')->store('overseas_job');
        }

        OverseasJob::create($data);

        Alert::toast('Overseas job successfully created', 'success');

        return redirect()->route('admin.overseas-job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OverseasJob  $overseasJob
     * @return \Illuminate\Http\Response
     */
    public function show(OverseasJob $overseasJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OverseasJob  $overseasJob
     * @return \Illuminate\Http\Response
     */
    public function edit(OverseasJob $overseasJob)
    {
        $countries = Country::orderBy('name')->get();
        return view('backend.overseas_job.edit', compact('overseasJob', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OverseasJob  $overseasJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OverseasJob $overseasJob)
    {
        $this->validate($request, [
            'job_title' => 'required|max:191',
            'country_id' => 'required',
            'company_name' => 'required|max:191',
            'trade' => 'required|max:191',
            'visa_type' => 'required|max:191',
            'deadline' => 'date|required',
            'working_hour' => 'required|max:191',
            'contact_duration' => 'required|max:191',
            'salary' => 'required|max:191',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->all();

        if ($request->hasFile('featured_image')) {

            if (Storage::exists($overseasJob->featured_image)) {
                Storage::delete($overseasJob->featured_image);
            }

            $data['featured_image'] = $request->file('featured_image')->store('overseas_job');
        }

        $overseasJob->update($data);

        Alert::toast('Overseas job successfully updated', 'success');

        return redirect()->route('admin.overseas-job.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OverseasJob  $overseasJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(OverseasJob $overseasJob)
    {
        if (Storage::exists($overseasJob->featured_image)) {
            Storage::delete($overseasJob->featured_image);
        }

        $overseasJob->delete();

        Alert::toast('Overseas job successfully deleted', 'success');

        return redirect()->route('admin.overseas-job.index');
    }
}
