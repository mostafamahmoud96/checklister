<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;



class TaskController extends Controller
{
    public function store(Request $request , Checklist $checklist):RedirectResponse

    {
        $checklist->tasks()->create($request->all());
        return \redirect() -> route('admin.checklist_groups.checklists.edit',[$checklist->checklist_group_id ,$checklist]);
    }

   
    public function edit(Checklist $checklist , Task $task):View
    {
        return view('admin.tasks.edit',compact('checklist','task'));
    }

    public function update( Request $request, Checklist $checklist,Task $task):RedirectResponse
    {
        $task->update($request->all());
        return redirect()->route('admin.checklist_groups.checklists.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
        
    }

    public function destroy(Checklist $checklist ,Task $task):RedirectResponse
    {
    $task->delete();
   return redirect()->route('admin.checklist_groups.checklists.edit', [
            $checklist->checklist_group_id, $checklist
        ]);

    }
}
