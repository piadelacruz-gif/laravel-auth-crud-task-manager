<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class TaskController extends Controller {
    public function index(Request $request): View {
        $filter = $request->query('filter','all');
        $query = $request->user()->tasks()->latest();
        if ($filter === 'completed') $query->where('is_completed', true);
        if ($filter === 'pending') $query->where('is_completed', false);
        return view('tasks.index',[
            'tasks'=>$query->paginate(10)->withQueryString(),
            'total'=>$request->user()->tasks()->count(),
            'completed'=>$request->user()->tasks()->where('is_completed',true)->count(),
            'filter'=>$filter
        ]);
    }
    public function create(): View { return view('tasks.create'); }
    public function store(Request $request): RedirectResponse {
        $data=$request->validate(['title'=>['required','string','max:255'],'description'=>['nullable','string','max:3000']]);
        $request->user()->tasks()->create($data);
        return redirect()->route('tasks.index')->with('status','Task added successfully.');
    }
    public function show(Request $request,Task $task): View {
        $this->authorizeOwner($request,$task);
        return view('tasks.show',compact('task'));
    }
    public function edit(Request $request,Task $task): View {
        $this->authorizeOwner($request,$task);
        return view('tasks.edit',compact('task'));
    }
    public function update(Request $request,Task $task): RedirectResponse {
        $this->authorizeOwner($request,$task);
        $data=$request->validate([
          'title'=>['required','string','max:255'],
          'description'=>['nullable','string','max:3000'],
          'is_completed'=>['sometimes','boolean']
        ]);
        $data['is_completed']=$request->boolean('is_completed');
        $task->update($data);
        return redirect()->route('tasks.index')->with('status','Task updated successfully.');
    }
    public function destroy(Request $request,Task $task): RedirectResponse {
        $this->authorizeOwner($request,$task);
        $task->delete();
        return redirect()->route('tasks.index')->with('status','Task deleted successfully.');
    }
    private function authorizeOwner(Request $request, Task $task): void {
        abort_unless($task->user_id === $request->user()->id,403,'This task does not belong to you.');
    }
}
