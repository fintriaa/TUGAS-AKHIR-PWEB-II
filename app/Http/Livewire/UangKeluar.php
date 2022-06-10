<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Uang_keluar;

class UangKeluar extends Component
{
    public $keluars, $id_keluar, $uang, $kategori, $deskripsi;
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
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->uang = '';
        $this->deskripsi = '';
        $this->kategori = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'uang' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);
   
        Uang_keluar::updateOrCreate(['id' => $this->id_keluar], [
            'uang' => $this->uang,
            'kategori' => $this->kategori,
            'deskripsi' => $this->deskripsi,
        ]);
  
        session()->flash('message', 
            $this->id_keluar ? ' Pengeluaranmu berhasil di edit.' : ' Pengeluaranmu berhasil ditambahkan.');
  
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $keluars = Uang_keluar::findOrFail($id);
        $this->id_keluar = $id;
        $this->uang = $Keluars->uang;
        $this->deskripsi = $Keluars->deskripsi;
        $this->kategori = $Keluars->kategori;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Uang_keluar::find($id)->delete();
        session()->flash('message', 'Pengeluaranmu berhasil di hapus.');
    }
}
