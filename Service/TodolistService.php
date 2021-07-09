<?php

namespace Service {

    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService
    {

        function showTodolist(): void;

        function addTodolist(string $todo): void;

        function removeTodolist(int $number): void;

    }

    class TodolistServiceImpl implements TodolistService{

        private TodolistRepository $todolistRepository;

        public function __construct(TodolistRepository $TodolistRepository){
            $this->todolistRepository = $TodolistRepository;
        }


        function showTodolist():void{
         echo "TODOLIST " . PHP_EOL;
         $todolist = $this->todolistRepository->findAll();
         foreach($todolist as $number => $value){
             echo "$number ." . $value->getTodo() . PHP_EOL; 
         }
        }
        function addTodolist(string $todo):void{
            $todolist = new TodoList($todo);
            $this->todolistRepository->save($todolist);
            echo "ADD TODO SUCCESSFUL" . PHP_EOL;
        }
        function removeTodolist(int $number):void{
            if($this->todolistRepository->remove($number)){
                echo "REMOVE TODO SUCCESSFUL" . PHP_EOL;
            }else{
                echo "Remove todolist failed" . PHP_EOL;
            }
        }

    }



}
