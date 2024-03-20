
<div class="container content py-6 mx-auto">
    <div class="mx-auto">
        <div id="create-form" class="hover:shadow p-6 bg-white border-blue-500 border-t-2">
            <div class="flex ">
                <h2 class="font-semibold text-lg text-gray-800 mb-5">Create New Todo</h2>
            </div>
            <div>
                <form>
                    <div class="mb-6">
                        <label for="newtodo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><sapn style="color:rgb(239, 45, 45)">*</sapn>
                            Todo </label>
                            <input type="text" wire:model='newtodo' id="newtodo" placeholder="Todo.."
                            class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                        @error('newtodo') <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span> @enderror
                        

                    </div>
                    <button wire:click.prevent="addTodo" type="submit"
                        class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Create
                        +</button>
                    @if (session('todo'))
                    <span class="text-green-500 text-xs">{{session('todo')}}</span>
                    @endif
                    

                </form>
               
            </div>
        </div>
    </div>
</div>