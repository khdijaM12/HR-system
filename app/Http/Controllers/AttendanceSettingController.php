<?php

namespace App\Http\Controllers;

use App\Models\AttendanceSetting;
use Illuminate\Http\Request;

class AttendanceSettingController extends Controller
{
    public function index()
    {
        $attendanceSettings = AttendanceSetting::all();
        return view('attendance_settings.index', compact('attendanceSettings'));
    }

    public function create()
    {
        return view('attendance_settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'max_late_minutes' => 'required|integer',
            'max_absent_days' => 'required|integer',
            'overtime_enabled' => 'required|boolean',
            'allow_shift_swap' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        AttendanceSetting::create($request->all());
        return redirect()->route('attendance-settings.index');
    }

    public function edit($id)
    {
        $attendanceSetting = AttendanceSetting::findOrFail($id);
        return view('attendance_settings.edit', compact('attendanceSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'max_late_minutes' => 'required|integer',
            'max_absent_days' => 'required|integer',
            'overtime_enabled' => 'required|boolean',
            'allow_shift_swap' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        $attendanceSetting = AttendanceSetting::findOrFail($id);
        $attendanceSetting->update($request->all());
        return redirect()->route('attendance-settings.index');
    }

    public function destroy($id)
    {
        AttendanceSetting::findOrFail($id)->delete();
        return redirect()->route('attendance-settings.index');
    }
}

