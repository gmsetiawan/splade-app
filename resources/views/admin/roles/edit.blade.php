<x-admin-layout>
  <h1 class="py-4 text-xl font-semibold">Edit Role</h1>
  <x-splade-form :default="$role" :action="route('admin.roles.update', $role)" method="PUT"
    class="p-4 bg-white rounded flex flex-col gap-2">
    <x-splade-input name="name" :label="__('Name')" />
    <x-splade-select name="permissions[]" label="Permissions" :options="$permissions" multiple relation choices />
    <x-splade-submit label="Update" />
  </x-splade-form>
</x-admin-layout>