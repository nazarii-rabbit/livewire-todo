<div class="flex gap-5">
    <div class="w-full md:w-1/2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-5">
            {{ __('Active Tasks') }}
        </h2>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 mb-10">
            @foreach($activeTodos as $activeTodo)
                <livewire:todo-item :todo="$activeTodo" :key="$activeTodo->id" />
            @endforeach
        </div>
    </div>

    <div class="w-full md:w-1/2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-5">
            {{ __('Completed Tasks') }}
        </h2>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            @foreach($completedTodos as $completedTodo)
                <livewire:todo-item :todo="$completedTodo" :key="$completedTodo->id" />
            @endforeach
        </div>
    </div>
</div>
