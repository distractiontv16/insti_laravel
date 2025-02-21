@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2"></path>
                    </svg>
                </div>
                <div class="ml-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Actualités</h3>
                    <div class="mt-2">
                        <a href="{{ route('admin.news.create') }}" class="text-indigo-600 hover:text-indigo-900">Ajouter une actualité →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="ml-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Médiathèque</h3>
                    <div class="mt-2">
                        <a href="{{ route('admin.media.create-album') }}" class="text-green-600 hover:text-green-900">Créer un album →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
