<x-admin-layout>
    <div class="py-4 flex justify-between items-center">
        <h1 class="text-xl font-semibold">States Index</h1>
        <Link href="{{ route('admin.states.create')}}" class="p-2 bg-gray-400 hover:bg-gray-700 rounded text-white">
        New
        State</Link>
    </div>
    <x-splade-table :for="$states">
        @cell('action', $state)
        <div class="space-x-2">
            <Link href="{{ route('admin.states.edit', $state)}}" class="text-green-400 hover:text-green-700">
            Edit</Link>
            <Link href="{{ route('admin.states.destroy', $state)}}" method="DELETE" confirm="Delete the state..."
                confirm-text="Are you sure?" confirm-button="Yes, take me there!" cancel-button="No, keep me save!"
                class="text-red-400 hover:text-red-700">
            Delete</Link>
        </div>
        @endcell
    </x-splade-table>
</x-admin-layout>