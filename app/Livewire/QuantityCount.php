<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;

class QuantityCount extends Component
{
    public function render()
    {
        $quantity=0;
        return view('livewire.quantity-count',compact('quantity'));
    }
    public function increase($id){
        $quantity=0;
        return $quantity++;
    }
    public function reduce($id){
        $quantity=1;
        return $quantity--;
    }
}
