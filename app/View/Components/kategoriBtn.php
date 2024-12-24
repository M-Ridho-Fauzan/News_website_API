<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\AdditionalService;

class kategoriBtn extends Component
{
    public $kategori;
    /**
     * Create a new component instance.
     */
    public function __construct(AdditionalService $kategoriServices)
    {
        $this->kategori = $kategoriServices->getSections(10);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.kategori-btn');
    }
}
