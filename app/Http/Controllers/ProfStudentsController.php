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

    public function list_td(Tdgroup $tdgroup) {
        $tpgroups = Tpgroup::where('tdgroup_id', $tdgroup->id)->get();
        $semesters = Semester::get();

        return view('admin/admin_td_users', compact('tdgroup', 'semesters'));
    }
}
