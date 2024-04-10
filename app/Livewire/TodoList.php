<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination ;
    public $Todo_inp ;

    public $Alert = false ;
    public $Alert_Message = '' ;

    public function Add_Todo(){
       Task::create([
            "task" => $this->Todo_inp ,
            "status" =>  1 ,
       ]) ;

       $this->Alert = true  ;
       $this->Alert_Message = "تم اضافه التاسك بنجاح" ;
    }

    public function close(){
        $this->Alert = false  ;
    }

    public function complated($id){
        $Task_id = Task::findOrFail($id) ;
        $Task_id->status = !$Task_id->status ;
        $Task_id->save() ;
    }

    public function Delete($id){
        $Delete_id = Task::findOrFail($id) ;
        $Delete_id->delete();
    }

    public function render()
    {
        $Tasks = Task::paginate(5);

        $Tasks_complated = Task::where("status" ,0)->get() ;

        return view('livewire.todo-list',[
            "Tasks" => $Tasks  ,
            "Tasks_complated" => $Tasks_complated ,
        ]);
    }
}
