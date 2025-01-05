<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\AdditionalService;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;

class ResponsivekategoriBtn extends Component
{
    public $kategori;
    /**
     * Create a new component instance.
     */
    public function __construct(AdditionalService $kategoriServices)
    {
        // $this->kategori = $kategoriServices->getSections(10);

        // dd($this->kategori);
        try {
            $this->kategori = $kategoriServices->getSections(10);
        } catch (RequestException $e) {
            Log::error('Failed to fetch categories: ' . $e->getMessage());
            $this->kategori = collect([]); // Pastikan selalu ada nilai default
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.responsive-kategori-btn', [
            'kategori' => $this->kategori
        ]);
    }
}
