<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $task;
    public function __construct()
    {
        $this->task = new Task();
    }
    public function index()
    {

        $tasks = $this->task::all();

        return response()->json(['tasks' => $tasks]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $this->task::create($validatedData);
            DB::commit();
            $response = [
                'status' => 'success',
                'code' => 201,
                'message' => 'Task Save Sucessfully',
            ];
            return response()->json($response);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => "Task save Fail",
                'errors' => $ex->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response()->json(['task' => $task]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task  $task)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $task->update($validatedData);
            DB::commit();
            $response = [
                'status' => 'success',
                'code' => 201,
                'data' =>  $task->toArray(),
                'message' => 'Task update Sucessfully',
            ];
            return response()->json($response);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => "Task update Fail",
                'errors' => $ex->getMessage()
            ],500);
         
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try {
            DB::beginTransaction();
            $task->delete();
            DB::commit();
            $response = [
                'status' => 'success',
                'code' => 201,
                'message' => 'Task deleted Sucessfully',
            ];
            return response()->json($response);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => "Task delete Fail",
                'errors' => $ex->getMessage()
            ],500);
        }
    }
}
