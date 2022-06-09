<x-layout title="Editar Link '{{ $link->url }}'">
    <x-links.form :action="route('link.updateData', $link->id)" :url="$link->nome" :slug="$link->slug"  :update="true" />
</x-layout>

