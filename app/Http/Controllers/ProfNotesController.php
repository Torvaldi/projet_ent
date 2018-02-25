<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Module;
use App\Note;
use App\Tdgroup;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Session;

class ProfNotesController extends Controller
{
    public function index() {
        $prof = User::with('prof_modules')->where('id', Auth::id())->firstOrFail();
        return view('admin/notes/admin_notes', compact('prof'));
    }

    public function get_students(Request $request) {
        $module_id = $request->input('module');

        $module = Module::where('id', $module_id)->firstOrFail();

        $users = new Collection;
        foreach ($module->tdgroups as $tdgroup) {
            foreach ($tdgroup->users as $user) {
                $users->add(User::where('id', $user['id'])->select('lastName', 'firstName')->firstOrFail());
            }
        }
        $users = $users->sortBy('lastName');

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

    public function post_notes(Request $request) {
        $module_id = $request->input('module');
        $name = $request->input('examName');
        $file = Input::file('excelFile');
        $maxPoints = $request->input('maxPoints');
        $coef = $request->input('coef');

        $module = Module::where('id', $module_id)->firstOrFail();
        $prof_id = Auth::id();

        $file_readed = Excel::load($file, function ($reader) {
            $reader->all();
        })->get();

        $users = new Collection;
        foreach ($module->tdgroups as $tdgroup) {
            foreach ($tdgroup->users as $user) {
                $users->add(User::where('id', $user['id'])->select('lastName', 'firstName')->firstOrFail());
            }
        }
        $count = count($users);

        if ($count == count($file_readed)) {
            $exam = new Exam();
            $exam->name = $name;
            $exam->coef = $coef;
            $exam->module_id = $module_id;
            $exam->prof_id = $prof_id;
            $exam->created_at = Carbon::now();
            $exam->maxPoints = $maxPoints;
            $exam->save();

            foreach ($file_readed as $key => $value) {
                $note = new Note();
                if (!is_float($value->note) && $value->note != null) {
                    $note->value = 0;
                } else {
                    $note->value = $value->note;
                }
                $note->created_at = Carbon::now();
                $user = User::where('lastName', $value->nom)->where('firstName', $value->prenom)->select('id')->firstOrFail();
                $note->user_id = $user->id;
                $note->exam_id = $exam->id;
                $note->save();
            }
            Session::flash('success', 'Notes ajoutées avec succès');
            return redirect()->route('prof_students_view_notes', ['module_id' => $module_id, 'exam_id' => $exam->id]);
        } else {
            Session::flash('danger', 'Une erreur s\'est produite !');
            return back();
        }
    }

    public function view() {
        $prof = User::with('prof_modules')->where('id', Auth::id())->firstOrFail();
        return view('admin/notes/admin_notes_view', compact('prof'));
    }

    public function viewExams($module_id) {
        $module = Module::where('id', $module_id)->firstOrFail();
        return view('admin/notes/admin_notes_view_module', compact('module'));
    }

    public function viewNotes($module_id, $exam_id) {
        $module = Module::where('id', $module_id)->firstOrFail();
        $exam = Exam::where('id', $exam_id)->firstOrFail();

        $average = DB::table('notes')
            ->where('exam_id', $exam_id)
            ->avg('value');

        $max = DB::table('notes')
            ->where('exam_id', $exam_id)
            ->max('value');

        $min = DB::table('notes')
            ->where('exam_id', $exam_id)
            ->min('value');

        return view('admin/notes/admin_notes_view_exam', compact('exam', 'module', 'average', 'max', 'min'));
    }

    public function editNote($note_id) {
        $note = Note::where('id', $note_id)->firstOrFail();
        return view('admin/notes/admin_note_edit', compact('note'));
    }

    public function editNotePost($note_id) {
        $note = Note::where('id', $note_id)->firstOrFail();
        $note->value = Input::get('value');
        $note->updated_at = Carbon::now();
        $note->save();

        Session::flash('success', 'Note mise à jour !');
        return redirect()->route('prof_students_view_notes', ['exam_id' => $note->exam->id, 'module_id' => $note->exam->module->id]);

    }
}
