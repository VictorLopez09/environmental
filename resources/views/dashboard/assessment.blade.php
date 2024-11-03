<x-layouts.app>

    @if (session('success'))
        <x-toast.toast message="{{ session('success') }}" type="success" />
    @elseif (session('error'))
        <x-toast.toast message="{{ session('error') }}" type="error" />
    @endif


    <section class=" bg-secondary pt-4 pb-4">
        <div class="max-w-3xl mx-auto bg-white shadow-lg p-6">
            
            <h1 class="text-2xl font-bold mb-4">{{ $form->title }}</h1>
        
            <form action="{{ route('assessment.store', ['form' => $form->id]) }}" method="POST">
                @csrf
        
                @foreach ($form->questions as $question)
                    <div class="mb-4">
                        <h4>{{ $question->question_text }}</h4>
        
                        @foreach ($question->answers as $index => $answer)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="answer{{ $answer->id }}" value="{{ $answer->id }}">
                                <label class="form-check-label" for="answer{{ $answer->id }}">
                                    {{ chr(65 + $index) }}. {{ $answer->answer_text }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
        
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
                    Enviar
                </button>

            </form>
        </div>
    </section>

</x-layouts.app>
