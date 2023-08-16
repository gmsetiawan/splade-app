<x-admin-layout>
  <h1 class="py-4 text-xl font-semibold">New Role</h1>
  <x-splade-form :action="route('admin.roles.store')" class="p-4 bg-white rounded flex flex-col gap-2">
    <x-splade-input name="name" :label="__('Name')" />
    <x-splade-select name="permissions[]" label="Permissions" :options="$permissions" multiple relation choices />
    <x-splade-submit label="Save" />
  </x-splade-form>
</x-admin-layout>