@props(['average'])

<div class="w-72 bg-gray-300 rounded-full dark:bg-gray-700">
    <div class="bg-gradient-to-r from-orange-600 to-gray-900 text-xs font-medium text-blue-100 text-center p-1 leading-none rounded-full"
        style="width: {{ ($average / 6) * 100 }}%" aria-valuenow="{{ $average }}" aria-valuemin="0" aria-valuemax="6">
        {{ $average }}</div>
</div>
