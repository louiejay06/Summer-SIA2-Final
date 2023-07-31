<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::orderBy('name')->get();

        return inertia('Patients/Index', [
            'patients' => $patients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Patients/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name'         => 'string|required',
            'address'  => 'string|required',
            'age'     => 'integer|required',
            'weight'      => 'integer|required',
            'height'      => 'integer|required',
            'email'      => 'string|required'
        ]);

        $fileName = null;

        if ($request->img) {
            $fileName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads/img'), $fileName);
            $fields['img'] = $fileName;
        }

        Patient::create($fields);

        return redirect()->route('patients')->banner('Saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return inertia('Patients/Show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return inertia('Patients/Edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name'         => 'string|required',
            'address'  => 'string|required',
            'age'     => 'integer|required',
            'weight'      => 'integer|required',
            'height'      => 'integer|required',
            'email'      => 'string|required',
        ]);

        $patient->update($request->all());

        $request->session()->flash('flash.banner', 'Sucvess.');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/patients/' . $patient->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients')->dangerBanner('Removed.');
    }

    public function search($searchKey)
    {
        return inertia('Patients/Index', [
            'patients' => Patient::where('name', 'like', "%$searchKey%")->get()
        ]);
    }

    public function toggleActive(Patient $patient)
    {
        $patient->enable = !$patient->enable;
        $patient->save();

        return back();
    }

    public function email(Patient $patient, Request $request) {

        Mail::send('emails.email',['patient'=>$patient], function($message) use($patient) {
        $message->to($patient->email);
        $message->subject('Patients Record');
    });

    $request->session()->flash('flash.banner', 'Sent.');
    $request->session()->flash('flash.bannerStyle', 'success');

    return back();
    }
}
