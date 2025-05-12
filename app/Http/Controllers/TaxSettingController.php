<?php

namespace App\Http\Controllers;

use App\Models\TaxSetting;
use Illuminate\Http\Request;

class TaxSettingController extends Controller
{
    public function index()
    {
        $taxSettings = TaxSetting::all();
        return view('tax_settings.index', compact('taxSettings'));
    }

    public function create()
    {
        return view('tax_settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'rate_percent' => 'required|numeric',
            'applies_to_salary' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        TaxSetting::create($request->all());
        return redirect()->route('tax-settings.index');
    }

    public function edit($id)
    {
        $taxSetting = TaxSetting::findOrFail($id);
        return view('tax_settings.edit', compact('taxSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'rate_percent' => 'required|numeric',
            'applies_to_salary' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        $taxSetting = TaxSetting::findOrFail($id);
        $taxSetting->update($request->all());
        return redirect()->route('tax-settings.index');
    }

    public function destroy($id)
    {
        TaxSetting::findOrFail($id)->delete();
        return redirect()->route('tax-settings.index');
    }
}

