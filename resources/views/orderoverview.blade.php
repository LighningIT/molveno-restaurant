<x-app-layout>

@vite(['resources/css/app.css', 'resources/css/orderoverview.css', 'resources/js/app.js'])

<div class="menudiv">
    <h2>Menu</h2>
</div>

<div class="tablemenudiv">
    <table>
        <tr>
            <th>Mealtype</th>
            <th>Category</th>
            <th>item</th>       
        </tr>
        <tbody>
            @foreach($menu as $m)
            <tr>
                @foreach($m as $item)
                {{ dd($m) }}
                <td></td>
                <td></td>
                <td>{{ $item->name}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
        <tr>
        </tr>
    </table>      
</div>

</x-app-layout>
