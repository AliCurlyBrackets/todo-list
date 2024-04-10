<div>
	<div class="container">
		<h2>TODO LIST</h2>
		<h3>Add Item</h3>
		<p>
			<input id="new-task" wire:model='Todo_inp' type="text">
                @error('Todo_inp')
                    {{ $message }}
                @enderror
            <button wire:click='Add_Todo'>Add</button>
		</p>

		<h3>Todo</h3>
		<ul id="incomplete-tasks">
            @foreach ($Tasks as $Task )
			<li>
                <input type="checkbox" wire:click='complated({{ $Task->id }})' @if($Task->status == 0) {{ "checked" }} @endif>
                <label> {{ $Task->task }} </label><input type="text"><button class="edit">Edit</button><button class="delete" wire:click='Delete({{ $Task->id }})'>Delete</button></li>
            @endforeach
		</ul>

		<h3>Completed</h3>
		<ul id="completed-tasks">

            @foreach ($Tasks_complated as $TC )
			    <li><input type="checkbox"  checked><label>{{ $TC->task }}</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li>
            @endforeach
		</ul>
        {{ $Tasks->links() }}
	</div>

</div>
