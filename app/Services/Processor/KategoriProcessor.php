<?php

namespace App\Services\Processor;

class KategoriProcessor
{
    public function processKategoriItem($item)
    {
        return [
            'id_kategori' => $item->id,
            'nama_kategori' => $item->webTitle,
        ];
    }
}
