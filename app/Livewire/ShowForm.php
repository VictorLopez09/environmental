<?php

namespace App\Livewire;

use App\Models\Form;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth; // Asegúrate de importar esta clase
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
        $user = Auth::user(); // Obtener el usuario autenticado

        // Obtener formularios según el campo de búsqueda
        if (empty($this->search)) {
            $forms = Form::paginate(9);
        } else {
            $forms = Form::where('title', 'like', '%' . $this->search . '%')
                ->paginate(9);
        }

        // Agregar la calificación y el estado de completado a cada formulario
        foreach ($forms as $form) {
            $form->score = UserAnswer::where('user_id', $user->id)
                ->where('form_id', $form->id)
                ->sum('score'); // Obtener la suma de las puntuaciones
            $form->completed = UserAnswer::where('user_id', $user->id)
                ->where('form_id', $form->id)
                ->exists(); // Verificar si ya completó el formulario
        }

        return view('livewire.show-form', ['forms' => $forms]);
    }
}
