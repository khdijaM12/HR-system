<?php

namespace App\Http\Controllers;

use App\Models\InsurancePolicy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



class InsurancePolicyController extends Controller
{
    public function index()
    {
        $policies = InsurancePolicy::all();
        return view('insurance_policies.index', compact('policies'));
    }

    public function destroy($id)
    {
        InsurancePolicy::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'تم حذف وثيقة التأمين');
    }

    public function trashed()
    {
        $trashed = InsurancePolicy::onlyTrashed()->get();
        return view('insurance_policies.trashed', compact('trashed'));
    }

    public function restore($id)
    {
        $policy = InsurancePolicy::withTrashed()->findOrFail($id);
        $policy->restore();
        return redirect()->back()->with('success', 'تم استرجاع الوثيقة');
    }

    public function forceDelete($id)
    {
        $policy = InsurancePolicy::withTrashed()->findOrFail($id);
        $policy->forceDelete();
        return redirect()->back()->with('success', 'تم حذف الوثيقة نهائيًا');
    }
}

