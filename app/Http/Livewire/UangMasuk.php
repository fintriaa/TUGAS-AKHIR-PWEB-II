<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Uang_Masuk;

class UangMasuk extends Component
{
    public $masuks, $id_masuk, $uang, $kategori, $deskripsi;
    public $isOpen = 0;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->masuks = Uang_Masuk::all();
        return view('livewire.uang-masuk');
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
   
        Uang_Masuk::updateOrCreate(['id' => $this->id_masuk], [
            'uang' => $this->uang,
            'kategori' => $this->kategori,
            'deskripsi' => $this->deskripsi,
        ]);
  
        session()->flash('message', 
            $this->id_masuk ? ' Pemasukkanmu berhasil di edit.' : ' Pemasukkanmu berhasil ditambahkan.');
  
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
        $masuks = Uang_Masuk::findOrFail($id);
        $this->id_masuk = $id;
        $this->uang = $masuks->uang;
        $this->deskripsi = $masuks->deskripsi;
        $this->kategori = $masuks->kategori;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Uang_Masuk::find($id)->delete();
        session()->flash('message', 'Pemasukanmu berhasil di hapus.');
    }
}
