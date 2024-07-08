<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];

        // Add additional rules for students (role_id 2)
        if ($user->role_id == 2) {
            $rules = array_merge($rules, [
                'institution' => ['required', 'string', 'max:255'],
                'education_qualification' => ['required', 'string', 'max:255'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date', 'after:start_date'],
                'description' => ['nullable', 'string'],
            ]);
        }

        Validator::make($input, $rules)->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();

            // Update additional fields for students (role_id 2)
            if ($user->role_id == 2) {
                $user->forceFill([
                    'institution' => $input['institution'],
                    'education_qualification' => $input['education_qualification'],
                    'start_date' => $input['start_date'],
                    'end_date' => $input['end_date'],
                    'description' => $input['description'],
                ])->save();
            }
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();

        // Update additional fields for students (role_id 2)
        if ($user->role_id == 2) {
            $user->forceFill([
                'institution' => $input['institution'],
                'education_qualification' => $input['education_qualification'],
                'start_date' => $input['start_date'],
                'end_date' => $input['end_date'],
                'description' => $input['description'],
            ])->save();
        }
    }
}
