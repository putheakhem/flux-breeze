<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="flush">
    <div class="space-y-6">
        <div>
            <flux:heading>
                {{ __('Delete Account') }}
            </flux:heading>

            <x-flux::subheading>
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </x-flux::subheading>
        </div>
        <div>
            <flux:modal.trigger name="confirm-user-deletion">
                <flux:button variant="danger">Delete</flux:button>
            </flux:modal.trigger>
        </div>
        <flux:modal name="confirm-user-deletion" class="min-w-[22rem] space-y-6">
            <form wire:submit="deleteUser" class="space-y-6">
                <div>
                    <flux:heading>
                        {{ __('Are you sure you want to delete your account?') }}
                    </flux:heading>

                    <x-flux::subheading>
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </x-flux::subheading>
                </div>

                <div class="mt-6">
                    <flux:input wire:model="password" type="password" label="{{__('Password')}}"/>
                </div>

                <div class="flex gap-2">
                    <flux:spacer/>

                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger">Delete</flux:button>
                </div>
            </form>
        </flux:modal>
    </div>
</div>
