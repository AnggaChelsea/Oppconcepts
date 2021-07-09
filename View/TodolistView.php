<?php

namespace View{

   use Service\TodolistService;
   use Helper\InputHelper;

    class TodolistView
    {

        private TodolistService $todolistService;
     
        public function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }

        function showTodolist(): void
        {
          while (true) {
            $this->todolistService->showTodolist();
            echo "MENU " . PHP_EOL;
            echo "1. Add Todo " . PHP_EOL;
            echo "2. Remove Todo " . PHP_EOL;
            echo "x. Keluar ". PHP_EOL;

            $pilihan = InputHelper::input("pilih");
            
            if($pilihan == "1"){
                $this->addTodoList();
            }
            elseif($pilihan == "2"){
                $this->removeTodoList();
            }
            elseif($pilihan == "x"){
                break;
            }else{
                echo " excuse your Choosing not found " . PHP_EOL;
            }
          }
          echo "See you Later";

        }

        function addTodolist(): void
        {
            echo "Adding Todo" . PHP_EOL;
            $todo = InputHelper::input("todo (x for cancel)");
            if($todo == "x"){
                echo "Cancel add todo" . PHP_EOL;
            }else{
                $this->todolistService->addTodolist($todo);
            }
        }

        function removeTodolist(): void
        {
           echo "Removing Todo" . PHP_EOL;
           $pilihan = InputHelper::input("Number (x for cancel)");
           if($pilihan == "x"){
               echo " cancel remove Todo" . PHP_EOL;
           }else{
               $this->todolistService->removeTodolist($pilihan);
           }
        }

    }

}
