<?php

namespace App\Http\Controllers;

use App\Note;
use App\Semester;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function index() {
        $semesters = Semester::get();

        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $notes = Note::where('user_id', $user->id)->orderBy('updated_at')->get();
        $total_points = 0;
        $total_coef = 0;
        if (count($notes) > 0) {
            foreach ($notes as $note) {
                $note_twenty = $note->value * 20 / $note->exam->maxPoints;
                $total_points = $total_points + ($note_twenty * $note->exam->coef);
                $total_coef = $total_coef + $note->exam->coef;
            }
        $average = $total_points/$total_coef;
        } else {
            $average = "";
        }
        return view('student.index_notes', compact('notes', 'average', 'semesters', 'user'));
    }
}
