<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Imagen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden flex">
        <!-- Sección de la imagen -->
        <div class="w-1/2 p-4 flex justify-center items-center bg-gray-200">
            <img src="{{ url('storage/images/' . $image->path) }}" 
                 alt="{{ $image->alt }}" 
                 class="object-contain h-96 w-full">
        </div>

        <!-- Sección del formulario de validación -->
        <div class="w-1/2 p-8 flex flex-col justify-center">
            <h2 class="text-xl font-semibold mb-4 text-center">Validación de la Imagen</h2>
            
            <!-- Mostrar mensaje de éxito si existe -->
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-2 rounded mb-4 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('validate.update', $image->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="block mb-2 font-semibold text-gray-600">
                    Estado de Validación:
                </label>
                
                <select name="is_validated" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    <option value="1" {{ $image->is_validated ? 'selected' : '' }}>Validada</option>
                    <option value="0" {{ !$image->is_validated ? 'selected' : '' }}>No Validada</option>
                </select>

                <button type="submit" class="w-full mt-4 bg-blue-500 text-white font-semibold p-2 rounded-lg shadow hover:bg-blue-600 transition duration-200">
                    Actualizar Estado
                </button>
            </form>
        </div>
    </div>
</body>
</html>
