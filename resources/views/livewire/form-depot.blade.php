<div class="mt-5">
    @if (session()->has('message'))
        <livewire:alert-succes message="{{ session('message') }}" />
    @endif
    <div class="text-center mb-5 text-2xl font-bold">
        <h1>Enregistrer un nouveau bordereau</h1>
    </div>
    <form class="max-w-sm mx-auto" wire:submit.prevent="submit">
        <div class="mb-5">
            <label for="ref" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">N° Réf.</label>
            <input type="text" id="ref" wire:model="ref"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Numéro de réference du bordereau" required />
            @error('ref')
                <livewire:error-form message="{{ $message }}" />
            @enderror
        </div>
        <div class="mb-5">
            <label for="montant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Montant</label>
            <input type="text" id="montant" wire:model="montant"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Montant deposé" required />
            @error('montant')
                <livewire:error-form message="{{ $message }}" />
            @enderror
        </div>
        <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date du
                dépot</label>
            <input type="date" id="date" wire:model="date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
            @error('date')
                <livewire:error-form message="{{ $message }}" />
            @enderror
        </div>
        <div class="mb-5">
            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo du
                bordereau</label>
            <input type="file" id="photo" wire:model="photo"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
            @error('photo')
                <livewire:error-form message="{{ $message }}" />
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
    </form>

</div>
