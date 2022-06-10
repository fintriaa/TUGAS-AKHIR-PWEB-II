<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $keluars,$masuks, $id_keluar, $uang, $kategori, $deskripsi;
    public $isOpen = 0;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->keluars = Uang_keluar::all();
        return view('livewire.uang-keluar');
    }
  
}
