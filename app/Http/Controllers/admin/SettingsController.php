<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Http\Requests\StoreSettingsRequest;
use App\Http\Requests\UpdateSettingsRequest;
use Illuminate\Support\Carbon;
use function PHPUnit\Framework\isEmpty;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Settings::first()->toArray();

        if ((!$data)) {

            $data = new Settings();
            $data->Title = 'Project Title';
            $data->created_at = Carbon::now();
            $data->save();
            $data = Settings::first();
        }

        return view('admin._settingsForm', [
            'data' => $data
        ]);

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
    public function store(StoreSettingsRequest $request)
    {

        $created = Settings::where('ID', 1)->update(
            [
                'Title' => $request->Title,
                'Keywords' => $request->Keywords,
                'Description' => $request->Description,
                'Company' => $request->Company,
                'Adress' => $request->Adress,
                'Phone' => $request->Phone,
                'Email' => $request->Email,
                'SmtpServer' => $request->SmtpServer,
                'SmtpEmail' => $request->SmtpEmail,
                'SmtpPassword' => $request->SmtpPassword,
                'SmtpPort' => $request->SmtpPort,
                'Facebook' => $request->Facebook,
                'Instagram' => $request->Instagram,
                'X' => $request->X,
                'AboutUs' => $request->AboutUs,
                'Contact' => $request->Contact,
                'References' => $request->References,
                'Status' => $request->Status,
                /* 'created_at' => $request->created_at, */
                'updated_at' => Carbon::now()
            ]

        );

        return redirect(route('admin_setting_get'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingsRequest $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
