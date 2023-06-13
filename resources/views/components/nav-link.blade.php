@props(['active', 'colorTexto' => 'gray'])

@php
$defaultColorClasses = 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-300 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

$colorClasses = [
    'red' => 'text-red-500 hover:text-red-700 hover:border-red-300 focus:text-red-700 focus:border-red-300',
    'blue' => 'text-blue-500 hover:text-blue-700 hover:border-blue-300 focus:text-blue-700 focus:border-blue-300',
    'white' => 'text-white hover:text-gray-300 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300',
    'gray' => 'text-gray-700 hover:text-gray-300 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300',
    // Agrega más colores si es necesario
];

$textColorClass = $colorClasses[$colorTexto] ?? '';

$classes = ($active ?? false)
    ? $defaultColorClasses . ' ' . 'text-gray-900' . ' ' . $textColorClass
    : $defaultColorClasses . ' ' . $textColorClass;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

