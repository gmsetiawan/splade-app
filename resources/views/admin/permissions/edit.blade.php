<x-admin-layout>
  <h1 class="py-4 text-xl font-semibold">Edit Permission</h1>
  <x-splade-form :default="$permission" :action="route('admin.permissions.update', $permission)" method="PUT"
    class="p-4 bg-white rounded flex flex-col gap-2">
    <x-splade-input name="name" :label="__('Name')" />
    <x-splade-select name="roles[]" label="Roles" :options="$roles" multiple relation choices />
    <x-splade-submit label="Update" />
  </x-splade-form>
</x-admin-layout>