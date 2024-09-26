<x-app-layout>
    <flux:heading size="xl" level="1">{{__('Profile')}}</flux:heading>

    <flux:subheading size="lg" class="mb-6">Manage your Account Information here!</flux:subheading>

    <flux:separator variant="subtle" />
    <div class="space-y-6 py-6 max-w-4xl" >
        <flux:card>
            <livewire:profile.update-profile-information-form />
        </flux:card>

        <flux:card>
            <livewire:profile.update-password-form />
        </flux:card>

        <flux:card>
            <livewire:profile.delete-user-form />
        </flux:card>

    </div>
</x-app-layout>
