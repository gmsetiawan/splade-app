<x-admin-layout>
    <div class="py-4 flex justify-between items-center">
        <h1 class="text-xl font-semibold">Countries Index</h1>
        <Link href="{{ route('admin.countries.create')}}" class="p-2 bg-gray-400 hover:bg-gray-700 rounded text-white">
        New
        Country</Link>
    </div>
    <x-splade-table :for="$countries">
        @cell('action', $country)
        <div class="space-x-2">
            <Link href="{{ route('admin.countries.edit', $country)}}" class="text-green-400 hover:text-green-700">
            Edit</Link>
            <Link href="{{ route('admin.countries.destroy', $country)}}" method="DELETE" confirm="Delete the country..."
                confirm-text="Are you sure?" confirm-button="Yes, take me there!" cancel-button="No, keep me save!"
                class="text-red-400 hover:text-red-700">
            Delete</Link>
        </div>
        @endcell
    </x-splade-table>
</x-admin-layout>