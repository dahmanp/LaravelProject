<x-layout>
    <x-slot:heading>
        Delete Account
    </x-slot:heading>

    <form method="POST" action="/user">
        @csrf
        @method('DELETE')

        <div class="space-y-12">
            <div class="border-b border-black/10 pb-12">

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    Please input your password to delete your account.

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="password" name="password" required type="password"></x-form-input>
                        </div>

                        <x-form-error name="password" />
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm/6 font-semibold text-black">Cancel</a>
            <x-form-button>Delete Account</x-form-button>
        </div>
    </form>

</x-layout>
