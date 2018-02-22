<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Semester;
use App\Tdgroup;
use App\Tpgroup;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class ProfStudentsController extends Controller
{
    public function index() {
        $promotions = Promotion::with('tdgroups')->get();
        return view('admin/admin_groups', compact('promotions'));
    }

    public function list_promotion(Promotion $promotion) {
        $semesters = Semester::with("users")->get();
        return view('admin/admin_promotion_users', compact('promotion', 'semesters'));
    }

    public function list_td(Tdgroup $tdgroup) {
        $semesters = Semester::with("users")->get();
        $tpgroups = Tpgroup::where('tdgroup_id', $tdgroup->id)->get();
        return view('admin/admin_td_users', compact('tdgroup', 'semesters'));
    }

    public function list_tp(Tpgroup $tpgroup) {
        $semesters = Semester::with("users")->get();
        return view('admin/admin_tp_users', compact('tpgroup', 'semesters'));
    }
}
