<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $myregex='regex:/'.'\+(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|
        2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|
        4[987654310]|3[9643210]|2[70]|7|1)\d{1,14}$'.'/';
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', $myregex, 'max:15', 'unique:users'], // regex
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'mobile' => $input['mobile'],
            //'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
