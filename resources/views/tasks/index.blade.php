@extends('layouts.master')

@section('content')
    

<div class="row mt-5">

    <div class="col-md-6">

    {{-- <!--    @if($errors->any())

        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">

        
        </div>
            
        @endforeach
        @endif --}}


        @if(session()->has('msg'))
       
         <div class = "alert alert-success">

            {{session()->get('msg')}}
         </div>


        @endif

        <div class="card">

            <div class="card-header">

                <h2>Add Tasks</h2>
            </div>

            <div class="card-body">
               

            <form action = "{{route('create.task')}}" method = "post">

                @csrf
                    <div class="form-group">
                          <label>Name of the task</label>
                    <input type="text" class="form-control {{$errors->has('title')? 'is-invalid' : ''}}"  name= "title" placeholder="enter your task name here"/>

                    <div class="invalid-feedback">{{$errors->has('title')? $errors->first('title') : ''}}</div>
                    </div>

                    <div class="form-group">
                    
                      <input type="submit" class="btn btn-primary"  />
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="row mt-5">

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">

                <h2>View  Tasks</h2>
            </div>

            <div class="card-body">
               <table class="table table-bordered">
                   <tr>

                    <th>Task</th>
                    <th colspan="2" style = "align : center;">Actions</th>
                    
                   </tr>
               
                   @foreach ($tasks as $task)
                   <tr>
                   <td>{{$task->title}}</td>
                   <form action = "{{ route('delete.task' , $task->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <td><button type = "submit" class="btn btn-danger btn-sm"> Delete</button></td>
                   </form>


                 <td><a  href = "{{route('task.edit',$task->id)}}"class="btn btn-warning btn-sm"> Update</a></td> 
                     
                   



                   
                </tr>
                   @endforeach
                 
               </table>

               
            </div>
        </div>
    </div>
</div>
@endsection