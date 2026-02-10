<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <!--<form method="GET" action="{{ url('/jobs') }}">
        <label for="sort">Sort By:</label>

        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="id" {{ request('sort') === 'id' ? 'selected' : '' }}>
                Job ID
            </option>

            <option value="title" {{ request('sort') === 'title' ? 'selected' : '' }}>
                Job Title (A-Z)
            </option>

            <option value="salary" {{ request('sort') === 'salary' ? 'selected' : '' }}>
                Salary (Lowest to Highest)
            </option>
        </select>
    </form>-->

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border bg-indigo-200 border-indigo-950 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>

                <div>
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year
                </div>
            </a>
        @endforeach
    </div>
        {{ $jobs->links() }}
</x-layout>
