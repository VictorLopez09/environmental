<?php

namespace App\Livewire;

use App\Models\Form;
use Livewire\Component;
use Livewire\WithPagination;

class ShowForm extends Component
{
    use WithPagination;

    public $search = ''; // Campo de búsqueda

    // Resetear la página cuando se cambia el valor de búsqueda
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Si el campo de búsqueda está vacío, mostrar los primeros 5 registros
        if (empty($this->search)) {
            $forms = Form::paginate(9);
        } else {
            // Si hay búsqueda, paginar los resultados de 10 en 10
            $forms = Form::where('title', 'like', '%' . $this->search . '%')
                ->paginate(9);
        }

        return view('livewire.show-form', ['forms' => $forms]);
    }
}
