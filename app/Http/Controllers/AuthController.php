<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        // Cambia aquí la forma en que validas
        $request->validate(
            [
                'username' => 'required|string|max:255|unique:users',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed', // Esto exige que 'password' y 'password_confirmation' sean iguales

            ],
            [
                'username.required' => 'El nombre de usuario es obligatorio.',
                'username.unique' => 'Este nombre de usuario ya está registrado.',
                'first_name.required' => 'El primer nombre es obligatorio.',
                'last_name.required' => 'El apellido es obligatorio.',
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'El correo electrónico debe ser una dirección válida.',
                'email.unique' => 'Este correo ya está registrado.',
                'password.required' => 'La contraseña es obligatoria.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                'password.confirmed' => 'Las contraseñas no coinciden.',
            ]
        );



        User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('log-in')->with('success', 'Registration successful! Please log in.');
    }


    public function login(Request $request)
    {
        // Validar los campos
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, introduce un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Extraer las credenciales
        $credentials = $request->only('email', 'password');

        // Agregar la lógica para "Recuérdame"
        $remember = $request->has('remember_me'); // Verificar si el checkbox fue marcado

        // Intentar autenticar al usuario con las credenciales y el valor de "Recuérdame"
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Redirigir al dashboard
            return redirect()->intended('dashboard');
        }

        // Si falla la autenticación
        return redirect()->route('log-in')->with(['error' => 'Las credenciales proporcionadas no coinciden con nuestros registros.']);

        
    }



    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar la sesión del usuario actual

        // Regenerar la sesión para evitar cualquier tipo de vulnerabilidad
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirigir a la página de inicio o login
    }
}
