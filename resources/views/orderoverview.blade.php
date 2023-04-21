<x-app-layout>

    @vite(['resources/css/app.css', 'resources/css/orderoverview.css', 'resources/js/app.js'])

    <div class="menudiv">
        <h2>The orders for kitchen</h2>
    </div>

    <div class="orderoverviewblade">
        @foreach ($orders as $order)
            <x-order-overview
                :tableSectionId="$order->section_id"
                :orderStatus="$order->order_status"
            />
        @endforeach
    </div>

    </x-app-layout>
