<?php

namespace App\Http\Persisters\User\Auth;

use App\Http\Persisters\BasePersister;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginPersister extends BasePersister
{
    private User $loggedUser;

    protected function executePersist(): void
    {
        $this->loggedUser = User::firstWhere('email', $this->data->get('email'));
        $this->signinUser();
    }

    private function signinUser(): void
    {
        if (Auth::attempt($this->data->only('email', 'password')->toArray())){
            $this->loggedUser->tokens()->delete();
            $this->loggedUser->withAccessToken($this->loggedUser->createToken('')->plainTextToken);
        }else{
            Auth::logout();
            abort(403, 'Wrong email or password');
        }
    }

    public function getLoggedUser(): User
    {
        return $this->loggedUser;
    }
}
