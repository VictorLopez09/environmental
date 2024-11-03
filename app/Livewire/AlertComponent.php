<?php

namespace App\Livewire;

use Livewire\Component;

class AlertComponent extends Component
{
    public $type;
    public $message;
    public $visible = false;

    public function show($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
        $this->visible = true;

        // Ocultar el mensaje después de 5 segundos
        $this->dispatchBrowserEvent('alert', ['visible' => true, 'type' => $type, 'message' => $message]);
        sleep(5);
        $this->visible = false;
        $this->dispatchBrowserEvent('alert', ['visible' => false]);
    }

    public function render()
    {
        return view('livewire.alert-component');
    }
}
