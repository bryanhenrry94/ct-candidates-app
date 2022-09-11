<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-sm-12 mx-auto">
                            <div class="card shadow my-4 border-0">
                                <form action="{{ route('todos.store') }}" method="POST">
                                    <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    - {{ $error }} <br>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="row">
                                            <p>Awesome Todo List</p>
                                            <div class="col-sm-6">
                                                <input type="text" name="description" class="form-control"
                                                    placeholder="What do you need to do today?"
                                                    value="{{ old('description') }}" autofocus>
                                            </div>

                                            <div class="col-auto">
                                                @csrf
                                                <x-primary-button class="ml-3">
                                                    {{ __('Enviar') }}
                                                </x-primary-button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <table class="table">
                                <thead>
                                    <th>Finsh</th>
                                    <th>Descripcion</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <td>
                                                
                                                <form action="{{ route('todos.edit', $todo) }}" method="POST">
                                                    {{-- @method('DELETE') --}}
                                                    @csrf
                                                    {{-- <input type="checkbox" name="state" value="{{ $todo->state }}"
                                                    /> --}}
                                                    <input type="checkbox" name="state" id="state" value="1" {{ str_contains($todo->state, '1') ? 'checked' : '' }}/>
                                                </form>
                                            <td>{{ $todo->description }}</td>
                                            <td>
                                                <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-primary-button class="ml-3">
                                                        {{ __('X') }}
                                                    </x-primary-button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
