<div>

    @if ($Alert != false)
        <div class="container mt-5">
            <div class="alert alert-success text-center" role="alert">
                <button type="button" class="btn-close" aria-label="Close" wire:click='close'></button>
                {{ $Alert_Message }}
            </div>
        </div>
    @endif

	<div class="container">
		<h2>TODO LIST</h2>
		<h3>Add Item</h3>
		@can("add-task")
        <p>
			<input id="new-task" wire:model='Todo_inp' type="text">
                @error('Todo_inp')
                    {{ $message }}
                @enderror
            <button wire:click='Add_Todo'>Add</button>
		</p>
        @endcan

		<h3>Todo</h3>
		<ul id="incomplete-tasks">
            @foreach ($Tasks as $Task )
			<li>
                <input type="checkbox" wire:click='complated({{ $Task->id }})' @if($Task->status == 0) {{ "checked" }} @endif>
                <label> {{ $Task->task }} </label><input type="text">
                    @can("update-task")
                      <button class="edit">Edit</button>  
                    @endcan
                @can("delete-task")
                    <button class="delete" wire:click='Delete({{ $Task->id }})'>Delete</button>
                @endcan
            </li>
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

    @can("show-users")
    <div class="container">
        <table class="table">
            <tr>
                <th> # </th>
                <th> UserName </th>
                <th> Email </th>
                <th> Role </th>
            </tr>

           @foreach ($Users as $User )
                <tr>
                 <td> {{$loop->iteration}} </td>
                 <td> {{$User->name}} </td>
                 <td> {{$User->email}} </td>
                 <td> {{$User->role}} </td>
            </tr>
           @endforeach
        
        </table>
    </div>
    @endcan

 

</div>
