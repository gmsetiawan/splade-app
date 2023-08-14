<x-admin-layout>
    <h1 class="py-4 text-xl font-semibold">New Country</h1>
    <x-splade-form :action="route('admin.countries.store')" class="p-4 bg-white rounded flex flex-col gap-2">
        <x-splade-input name="country_code" :label="__('Country Code')" />
        <x-splade-input name="name" :label="__('Name')" />
        <x-splade-submit label="Save" />
    </x-splade-form>
</x-admin-layout>