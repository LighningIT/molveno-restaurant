<div class="fixed z-10 top-0 left-0 w-full h-full bg-black bg-opacity-60 flex flex-col justify-center items-center">
    <div {{$attributes->merge(["class" => "border border-solid border-black dark:bg-molveno-darkestBlue dark:border-white h-auto text-black font-bold text-lg p-8 px-12 pt-12 relative"])}}>
        <button class="bg-red-600 hover:bg-red-500 px-2 py-2 text-white rounded-full dark:text-white cursor-pointer absolute top-2 right-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        {{ $slot }}
    </div>
</div>
