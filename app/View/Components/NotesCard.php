<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class NotesCard extends Component
{



    public $title, $content, $tags, $date, $id;
    public function __construct($title, $content, $tags, $date, $id)
    {
        $this->title = $title;
        $this->content = $content;
        $this->tags = $tags;
        $this->date = $date;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notes-card');
    }
}
