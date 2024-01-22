@extends('admin.dashboard')

<!-- Permet de gérer la maintenance du site -->
@section('content')
    <h1 class="text-3xl font-medium text-gray-700">Gestion Maintenance</h1>
    <div class="container mx-auto mt-10 bg-white p-3">
        <form method="post" action="{{ route('admin.maintenance.toggle') }}">
            @csrf

            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="enabled"
                           class="form-checkbox" {{ $maintenanceEnabled ? 'checked' : '' }}>
                    <span class="ml-2 text-sm font-medium font-sans text-gray-600">Activer la maintenance</span>
                </label>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Sauvegarder
            </button>
        </form>
    </div>
@endsection
