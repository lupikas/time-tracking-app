<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TasksExport;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

  public function __construct(){

    $this->middleware('auth');
  }

  public function index(){

    $userId = Auth::id();
    $tasks = task::Where('user_id', $userId)->paginate(5);

    return view ('tracking.dashboard', compact('tasks'));
  }

  public function create(){

    return view('tracking.create');
  }

  public function store(Request $request){

    $data = request()->validate([
      'title' => 'required',
      'comment' => 'required',
      'minutes' => 'required | numeric'
    ]);

    $userId = Auth::id();
    $createTask = task::create([
      'title' => $request->get('title'),
      'comment' => $request->get('comment'),
      'minutes' => $request->get('minutes'),
      'user_id' => $userId
      ]);

      return redirect ('dashboard');

  }

  public function export(Request $request){

    if ($request->input('exportexcel') != null ){
      return Excel::download(new  TasksExport, 'tasks.xlsx');
    }

    if ($request->input('exportcsv') != null ){
      return Excel::download(new TasksExport, 'tasks.csv');
    }

    if ($request->input('exportpdf') != null ){
      $userId = Auth::id();
      $tasks = task::Where('user_id', $userId)->get();
      $minutes = task::Where('user_id', $userId)->sum('minutes');
      view()->share('tasks',  $tasks, );
      $pdf = PDF::loadView('tracking.pdf_view', compact('tasks', 'minutes'));
      return $pdf->download('tasks.pdf');
    }
      return back();
  }

  public function logout(Request $request) {

    Auth::logout();
    return redirect('/');
  }
}
