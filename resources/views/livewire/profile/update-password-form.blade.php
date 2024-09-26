<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        Flux::toast('Password updated successfully.');
    }
}; ?>

<div>
    <div>
        <flux:heading>
            {{ __('Update Password') }}
        </flux:heading>

        <flux:subheading>
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </flux:subheading>
    </div>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <div>
            <flux:input wire:model="current_password" type="password" label="{{__('Current Password')}}"/>
        </div>

        <div>
            <flux:input wire:model="password" type="password" label="{{__('New Password')}}"/>
        </div>

        <div>
            <x-flux::input wire:model="password_confirmation" type="password" label="{{__('Confirm Password')}}"/>
        </div>

        <div>
            <flux:button type="submit" variant="primary">{{__('Save')}}</flux:button>
        </div>
    </form>
</div>
