<?php
namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;

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
}
