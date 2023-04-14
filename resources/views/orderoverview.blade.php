<x-app-layout>

@vite(['resources/css/app.css', 'resources/css/orderoverview.css', 'resources/js/app.js'])

<x-order-overview>

    <div class="tablemenudiv">
        <table>
            <tr>
                <th>Item</th>
                <th>Category</th>
                <th>Mealtype</th>       
            </tr>
            <tr>
                @foreach($menumealtypes as $menumealtype)
                    <td>$menumealtype->name</td>
                @endforeach

                @foreach($menucategories as $menucategory)
                    <td>$menucategory->name</td>
                @endforeach

                @foreach($menuitems as $menuitem)
                    <td>$menuitem->name</td>
                @endforeach
            </tr>
        </table>      
    </div>

</x-order-overview>

</x-app-layout>
