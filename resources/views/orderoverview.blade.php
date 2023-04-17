<x-app-layout>

@vite(['resources/css/app.css', 'resources/css/orderoverview.css', 'resources/js/app.js'])

<div class="menudiv">
    <h2>Menu</h2>
</div>

<div class="tablemenudiv dark:text-white">
    <table>
        <tr>
            <th>Mealtype</th>
            <th>Category</th>
            <th>item</th>
        </tr>
        <tbody>

            @foreach($menu as $m)
                {{-- {{ dd()}} --}}
                @foreach($m->getRelations()['menuMealType'] as $item)
                <tr>
                    {{ dd($item) }}
                   {{--  <td>{{ $m[0]->name}}</td>
                    <td>{{ $m[1]->name }}</td>
                    <td>{{ $m[2]->name}}</td> --}}
                </tr>
                @endforeach
            @endforeach
        </tbody>
        <tr>
        </tr>
    </table>
</div>

</x-app-layout>
