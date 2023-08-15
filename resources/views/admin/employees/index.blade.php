<x-admin-layout>
    <div class="py-4 flex justify-between items-center">
        <h1 class="text-xl font-semibold">Employees Index</h1>
        <Link href="{{ route('admin.employees.create')}}" class="p-2 bg-gray-400 hover:bg-gray-700 rounded text-white">
        New
        Employees</Link>
    </div>
    <x-splade-table :for="$employees">
        @cell('action', $employee)
        <div class="space-x-2">
            <Link href="{{ route('admin.employees.edit', $employee)}}" class="text-green-400 hover:text-green-700">
            Edit</Link>
            <Link href="{{ route('admin.employees.destroy', $employee)}}" method="DELETE"
                confirm="Delete the employee..." confirm-text="Are you sure?" confirm-button="Yes, take me there!"
                cancel-button="No, keep me save!" class="text-red-400 hover:text-red-700">
            Delete</Link>
        </div>
        @endcell
    </x-splade-table>
</x-admin-layout>