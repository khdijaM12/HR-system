<?php

namespace App\Http\Controllers;

use App\Models\InsuranceType;
use Illuminate\Http\Request;

class InsuranceTypeController extends Controller
{
    // عرض السجلات النشطة فقط
    public function index()
    {
        $types = InsuranceType::all();
        return view('insurance_types.index', compact('types'));
    }

    // حذف "شكلي" (Soft Delete)
    public function destroy($id)
    {
        InsuranceType::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'تم حذف نوع التأمين');
    }

    // عرض السجلات المحذوفة فقط
    public function trashed()
    {
        $trashedTypes = InsuranceType::onlyTrashed()->get();
        return view('insurance_types.trashed', compact('trashedTypes'));
    }

    // استعادة سجل محذوف
    public function restore($id)
    {
        $type = InsuranceType::withTrashed()->findOrFail($id);
        $type->restore();
        return redirect()->back()->with('success', 'تم استرجاع نوع التأمين');
    }

    // حذف نهائي
    public function forceDelete($id)
    {
        $type = InsuranceType::withTrashed()->findOrFail($id);
        $type->forceDelete();
        return redirect()->back()->with('success', 'تم حذف نوع التأمين نهائيًا');
    }
}

