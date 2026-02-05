<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>

    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>

    <button
        onclick="window.location='/jobs'"
        class="mt-4 px-4 py-2 text-gray-50 bg-indigo-950/50 rounded hover:bg-indigo-950">
        Return to Jobs Page
    </button>
</x-layout>
