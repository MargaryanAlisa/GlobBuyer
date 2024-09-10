<?php

namespace App\Http\Persisters\User\Auth;

use App\Http\Persisters\BasePersister;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterPersister extends BasePersister
{
    private User $registeredUser;

    protected function executePersist(): void
    {
        $this->createUser();

        $this->signinUser();
    }

    private function createUser(): void
    {
        $this->registeredUser = User::create([
            'name' => $this->data->get('name'),
            'lastname' => $this->data->get('surname'),
            'phone_number' => $this->data->get('phoneNumber'),
            'email' => $this->data->get('email'),
            'password' => $this->data->get('password'),
            'role' => User::ROLES['user'],
        ]);

        $this->createUserAddress();
        $this->createUserIdentityVerification();
    }

    private function createUserAddress(): void
    {
        $this->registeredUser->address()->create([
            'country' => $this->data->get('country'),
            'state_province' => $this->data->get('stateProvince'),
            'city' => $this->data->get('city'),
            'postal_code' => $this->data->get('postalCode'),
            'residence_address' => $this->data->get('residenceAddress'),
        ]);
    }

    private function createUserIdentityVerification(): void
    {
        if ($this->data->get('passportNumber')) {
            $this->registeredUser->identityVerification()->create([
                'passport_number' => $this->data->get('passportNumber'),
            ]);
        }
    }

    private function signinUser(): void
    {
        $this->registeredUser->withAccessToken($this->registeredUser->createToken('')->plainTextToken);
        Auth::login($this->registeredUser);
    }

    public function getRegisteredUser(): User
    {
        return $this->registeredUser;
    }
}
