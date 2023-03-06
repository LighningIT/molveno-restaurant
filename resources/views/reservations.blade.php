<x-app-layout>

        @foreach ($tables as $table)
        <x-tablegroups
            :id="$table->id"
            :tableSectionId="$table->table_section_id"
            :combined="$table->combined"
            :comments="$table->comments"
            :chairs="$table->chairs"
            :statusId="$table->status_id" />
        @endforeach
</x-app-layout>
