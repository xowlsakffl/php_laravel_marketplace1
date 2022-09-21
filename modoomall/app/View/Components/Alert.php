<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    
    /** 
    * 경고의 우선 순위, 즉 "정보" 또는 "경고" 
    * 
    * @var string 
    */ 
   public $level; 

   /** 
    * 사용자에게 표시할 메시지 또는 메시지 배열 
    * 
    * @var mixed 
    */ 
   public $message; 

   /** 
    * 새 구성 요소 인스턴스를 만듭니다. 
    * 
    * @param   string $level 
    * @param   혼합 $message 
    */ 
   public function __construct(string $level, $message) 
   { 
      $this->level = $level; 
      $this->message = $message; 
   } 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
