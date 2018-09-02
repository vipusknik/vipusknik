<tbody class="institution-specialty-table-body">
    @foreach ($institution->specialties as $specialty)
        <tr>
            <td class="py-3 px-4">
                <div>
                    <a href="{{ route('specialties.show', $specialty) }}" class="text-black no-underline">{{ $specialty->title }}</a>
                </div>
            </td>
            <td class="py-3 text-center">
                <div class="border-r border-l border-grey-dark">{{ $specialty->code }}</div>
            </td>
            <td class="py-3 text-center">
                <div class="border-r border-grey-dark">{{ $specialty->pivot->study_price }} тг</div>
            </td>
            <td class="py-3 text-center">
                <div>{{ $specialty->pivot->study_period }}</div>
            </td>
        </tr>
    @endforeach
</tbody>
