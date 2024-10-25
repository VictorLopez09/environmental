<x-layouts.app>




    <div class="max-w-3xl mx-auto bg-white shadow-lg p-6">
        
        <div class="max-w-3xl mx-auto bg-white shadow-lg p-6">

            <h1 class="text-2xl font-bold mb-4">{{ $form->title }}</h1>

            @if (session('success'))
                <div 
                    x-data="{ open: true }" 
                    x-show="open" 
                    x-init="setTimeout(() => open = false, 5000)"  
                    class="fixed top-5 right-5 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 shadow-lg rounded-md z-50"
                    role="alert"
                >
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="font-bold">Be Warned</p>
                            <p>{{ session('success') }}</p>
                        </div>
                        <button @click="open = false" class="text-green-700 hover:text-green-900 font-bold ml-4">
                            &times;
                        </button>
                    </div>
                </div>
            @endif
        
    
            <form action="" method="POST">
                @csrf
        
                @foreach ($form->questions as $question)
                    <div class="mb-4">
                        <h4>{{ $question->question_text }}</h4>
        
                        @foreach ($question->answers as $answer)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="answer{{ $answer->id }}" value="{{ $answer->id }}">
                                <label class="form-check-label" for="answer{{ $answer->id }}">
                                    {{ $answer->answer_text }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
        
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>

        
    </div>

</x-layouts.app>