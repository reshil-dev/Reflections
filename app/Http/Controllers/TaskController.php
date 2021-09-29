<?php
namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->handleResponse(
            TaskResource::collection(Task::all()),
            'Projects have been retrieved!'
        );
    }

    public function priorityTask(Request $request)
    {
        $timeLeftToday = 5;
        $timeForTomorrow = 8;
        $today = '2021-07-30 19:07:22';
        $task = $this->getSuitabelTask($timeLeftToday, $timeForTomorrow, $today);
        return $this->handleResponse(new TaskResource($task), 'Task retrieved!');
    }

    protected function getSuitabelTask($timeLeftToday, $timeForTomorrow = null, $today = null)
    {
        //only considering open status tasks, no enough details to consider the inprogress tasks,
        //no field provided for the time spend on inprogress tasks,so to calculate the required time to spend on the same.

        $totalTimeleftUntilTomorrow = $timeLeftToday + $timeForTomorrow;

        $task = null;

        $tasks = Task::whereStatus('open')
        ->where('due_date', '>=', $today)
        ->orderBy('due_date', 'ASC')
        ->orderBy('priority', 'ASC')
        ->get();

        foreach ($tasks as $task) {
            if ($task->estimation <= $timeLeftToday) {
                return $task;
            } elseif ($task->estimation <= $totalTimeleftUntilTomorrow) {
                return $task;
            }
        }
        return $task;
    }
}
