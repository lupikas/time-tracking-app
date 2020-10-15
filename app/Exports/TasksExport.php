<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use App\Models\task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class TasksExport implements FromCollection,WithHeadings
{
  public function headings(): array {

    $userId = Auth::id();
    $records = DB::table('tasks')->where('user_id', $userId)->select('id','title','minutes','created_at')->get()->toArray();
    $minutes = task::Where('user_id', $userId)->sum('minutes');

    return [
       "Id","Title","Time spent","Created at", "Total time spent: ". $minutes . " minutes"
    ];
  }

  public function collection() {

    return collect(task::getTasks());

  }

}
