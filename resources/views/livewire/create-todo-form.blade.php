<div>
    <form wire:submit.prevent="submit">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks List
            </h2>
            <x-button wire:click="$toggle('popupAddTask')" wire:loading.attr="disabled">
                {{ __('Add Task') }}
            </x-button>
        </div>

        <x-dialog-modal wire:model.live="popupAddTask">
            <x-slot name="title">
                {{ __('Add Task') }}
            </x-slot>

            <x-slot name="content">
                <x-input type="text" id="description" wire:model="description" class="block w-full"></x-input>
                <x-input-error for="description" class="mt-2" />
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('popupAddTask')">Close</x-secondary-button>
                <x-button type="submit">Add task</x-button>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>
