<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Importar facade Auth

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
         Log::info("Usuario->email autenticado exitosamente.");
        try {
            // Autenticar usuario y validar rate limiting
            $request->authenticate();

            // Usar facade Auth para evitar warning de Intelephense
            // $user = Auth::user();

            $user = User::where('email', $request->email)->first();

            // dd(get_class($user));
            // Verificar si el usuario está activo

            // Crear token con scopes (opcional)
            $token = $user->createToken('api-token', ['*'])->plainTextToken;

            // Registrar login exitoso
           Log::info("Usuario {$user->email} autenticado exitosamente.");

            return response()->json([
                'status' => 'success',
                'message' => 'Autenticación exitosa',
                'token' => $token,
                'user' => new UserResource($user),
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Intento de login fallido para email: ' . $request->input('email'));

            return response()->json([
                'status' => 'error',
                'message' => 'Credenciales inválidas o demasiados intentos. Intenta más tarde.',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            Log::error('Error inesperado en login: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Error interno del servidor. Intenta nuevamente más tarde.',
            ], 500);
        }
    }
}
