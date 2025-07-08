<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Auth; // Importar facade Auth
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ];
    }

    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited()
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            throw ValidationException::withMessages([
                'email' => __('auth.throttle', [
                    'seconds' => RateLimiter::availableIn($this->throttleKey()),
                    'minutes' => ceil(RateLimiter::availableIn($this->throttleKey()) / 60),
                ]),
            ]);
        }
    }

    public function throttleKey()
    {
        return strtolower($this->input('email')) . '|' . $this->ip();
    }
}
