@extends('layouts.admin')
@section('title')
    New word
@endsection
@section('header')
    <span  style="font-size:30px; color:#fff">Форма для добавения нового слова</span>
@endsection
@section('add')
    active
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            Добавления слов
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        
        <form method="POST" action="{{route('add-word')}}" class="g-3 needs-validation" novalidate>
            @csrf
            <input type="hidden" name="id_users" value="{{Auth::user()->id}}"  class="form-control" >
            <div>
                <x-jet-label for="tj_word" value="{{ __('Введите таджидского слово') }}" />
                <x-jet-input  class="block mt-1 w-full form-control" type="text" name="tj_word" required placeholder="Введите слова на таджиксом" />
            </div>
            <div class="invalid-feedback">
                Пожалуйста, введите перевод таджидского слова
            </div>

            <div class="mt-4">
                <x-jet-label for="en_word" value="{{ __('Введите английского слово') }}" />
                <x-jet-input  class="block mt-1 w-full form-control" type="text"  name="en_word" required placeholder="Введите перевод  на английском"/>
                <div class="invalid-feedback">
                    Пожалуйста, введите перевод таджидского слова на английском
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Добавить ') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection