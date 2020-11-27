<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    
    public function index(){

        $tasks = Task::all();

        //dd($tasks);
        return view('tasks.index' , compact('tasks'));
    }

    public function store(Request $request){
       // dd($request->all());

       //validation

       $request->validate([
           'title' => 'required'
        
       ]);
   //       dd($request->title);

   Task::create([

    'title'=>$request->title
   ]);

   session()->flash('msg' ,'Task has been created');

   return redirect('/');

    }


    public function destroy($id){
      
         Task::destroy($id);

         return redirect()->back()->with('msg','Task has been deleted');
 
    }

    public function edit($id){

        $tasks = Task::find($id);
        return view('tasks.edit')->withTask($tasks);


    }
 
     public function update($id , Request $request){

        $task = Task::find($id);

         $request->validate([
             'title'=>'required'
         ]);

         $input = $request->all();

        $task->fill($input)->save();
     

        session()->flash('msg' ,'Task has been Updated');

   return redirect('/');

     }
    
}
