<x-admin-layout>
  <h1 class="py-4 text-xl font-semibold">Edit User</h1>
  <x-splade-form :default="$user" :action="route('admin.users.update', $user)" method="PUT"
    class="p-4 bg-white rounded flex flex-col gap-2">
    <x-splade-input name="username" :label="__('Username')" />
    <x-splade-input name="first_name" :label="__('First Name')" />
    <x-splade-input name="last_name" :label="__('Last Name')" />
    <x-splade-input name="email" label="Email address" />
    <x-splade-select name="roles[]" label="Roles" :options="$roles" multiple relation choices />
    <x-splade-select name="permissions[]" label="Permissions" :options="$permissions" multiple relation choices />
    <x-splade-submit label="Update" />
  </x-splade-form>
</x-admin-layout>