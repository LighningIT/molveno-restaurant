<x-app-layout>

@vite(['resources/css/app.css', 'resources/css/orderoverview.css', 'resources/js/app.js'])

<div class="menudiv">
    <h2>Menu</h2>
</div>

<div class="tablemenudiv dark:text-white">
    @foreach($menu as $m)
        <table>
            <thead>
                <tr>
                    <th>Mealtype</th>
                    <th>Category</th>
                    <th>item</th>
                </tr>
            </thead>
        @foreach($m->getRelations()['menuMealType'] as $item)
        <tbody>
            <tr>
                <td>
                    {{ $item }}
                </td>
                {{--  <td>{{ $m[0]->name}}</td>
                <td>{{ $m[1]->name }}</td>
                <td>{{ $m[2]->name}}</td> --}}
            </tr>
        </tbody>
        @endforeach

        </table>
    @endforeach
</div>

</x-app-layout>
