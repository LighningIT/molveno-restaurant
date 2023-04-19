<x-app-layout>

@vite(['resources/css/app.css', 'resources/css/menuoverview.css', 'resources/js/app.js'])

<div class="menudiv">
    <h2>Menu</h2>
</div>

<div class="tablemenudiv dark:text-white">

        @foreach($FoodMenu as $item)
            @foreach($item->getRelations()['menuMealType'] as $menumealtype)
                <table class="menutable">
                    <tr>
                        <th>{{ $menumealtype->name}}</th>
                    </tr>
                    @foreach($menumealtype->getRelations()['categories'] as $category)
                        <tbody>
                            <tr>
                                <td>{{ $category->name}}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
        @endforeach
    @endforeach
    @foreach($BeverageMenu as $item)
        @foreach($item->getRelations()['menuMealType'] as $menumealtype)
        <table>
            <tr>
                <th>{{ $menumealtype->name }}</th>
            </tr>
            @foreach($menumealtype->getRelations()['categories'] as $category)
            <tr>
                <td>{{ $category->name }}</td>
            </tr>
                @foreach($category->getRelations()['menuItems'] as $menuitem)
                    <tbody>
                        <tr>
                            <td class="winetd">{{ $menuitem->name }}</td>
                        </tr>
                    </tbody>
                @endforeach
            @endforeach
        </table>
    @endforeach
    @endforeach
</div>

</x-app-layout>
