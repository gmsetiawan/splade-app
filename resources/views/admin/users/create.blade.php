<x-admin-layout>
    <h1 class="py-4 text-xl font-semibold">New User</h1>
    <x-splade-form :action="route('admin.users.store')" class="p-4 bg-white rounded flex flex-col gap-2">
        <x-splade-input name="username" :label="__('Username')" />
        <x-splade-input name="first_name" :label="__('First Name')" />
        <x-splade-input name="last_name" :label="__('Last Name')" />
        <x-splade-input name="email" label="Email address" />
        <x-splade-input type="password" name="password" label="Password" />
        <x-splade-input type="password" name="password_confirmation" label="Password Confirmation" />
        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>