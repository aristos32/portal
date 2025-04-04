<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackButton extends Component
{
    public $url;

    public function __construct()
    {
        $this->url = url()->previous();
    }

    public function render()
    {
        return view('components.back-button');
    }
}
