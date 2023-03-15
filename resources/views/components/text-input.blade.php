@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-100 dark:bg-white dark:text-gray-900 focus:border-molveno-lightestBlue dark:focus:border-molveno-lightestBluefocus:ring-molveno-lightestBlue dark:focus:ring-molveno-lightestBlue rounded-md shadow-sm']) !!}>
