<?php

namespace App\Http\Controllers;

use App\Module;
use App\Tdgroup;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class ProfNotesController extends Controller
{
    public function index() {
        $prof = User::with('prof_modules')->where('id', Auth::id())->firstOrFail();
        return view('admin/notes/admin_notes', compact('prof'));
    }

    public function get_students(Request $request) {
        $module_id = $request->input('module');
        $tdgroup_id = $request->input('tdgroup');
        $tpgroup_id = $request->input('tpgroup');

        $module = Module::where('id', $module_id)->firstOrFail();

        if ($tpgroup_id != null && $tdgroup_id != null && $module_id != null) {
            $users = User::where('tpgroup_id', $tpgroup_id)->select('lastName', 'firstName')->distinct()->orderBy('lastName', 'asc')->get();
        } elseif (!$tpgroup_id && $tdgroup_id != null && $module_id != null) {

            $tdgroup = Tdgroup::where('id', $tdgroup_id)->firstOrFail();
            $users = new Collection;
            foreach ($tdgroup->users as $user) {
                $users->add(User::where('id', $user['id'])->select('lastName', 'firstName')->firstOrFail());
            }
            $users = $users->sortBy('lastName');
        } elseif (!$tpgroup_id && !$tdgroup_id && $module_id != null) {
            $users = new Collection;
            foreach ($module->tdgroups as $tdgroup) {
                foreach ($tdgroup->users as $user) {
                    $users->add(User::where('id', $user['id'])->select('lastName', 'firstName')->firstOrFail());
                }
            }
        } else {
            Session::flash('danger', 'Une erreur s\'est produite !');
            return back();
        }

        return Excel::create($module->name, function ($excel) use ($users) {
            $excel->sheet('notes', function($sheet) use ($users) {
                $sheet->cell('A1', function ($cell) {
                    $cell->setValue('Nom');
                });
                $sheet->cell('B1', function ($cell) {
                    $cell->setValue('Prénom');
                });
                $sheet->cell('C1', function ($cell) {
                    $cell->setValue('Note');
                });
                $sheet->fromArray($users, null, 'A2', true, false);
            });
        })->export('xls');
    }

    public function json_td_groups($module_id) {
        $module = Module::with('tdgroups')->where('id', $module_id)->firstOrFail();
        $toReturn = new Collection;
        foreach ($module->tdgroups as $tdgroup) {
            $toReturn->add($tdgroup);
        }
        return response()->json($toReturn);
    }

    public function json_tp_groups($tdgroup_id) {
        $tdgroup = Tdgroup::with('tpgroups')->where('id', $tdgroup_id)->firstOrFail();
        $toReturn = new Collection;
        foreach ($tdgroup->tpgroups as $tpgroup) {
            $toReturn->add($tpgroup);
        }
        return response()->json($toReturn);

    }
}
