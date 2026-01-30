<?php
namespace App\Traits;

trait BackToCardMenu
{
    public function backToMenu()
    {
        // dd("");
        $this->dispatch('handleStep', "menu");
    }
}