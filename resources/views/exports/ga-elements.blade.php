<table>
    <thead>
    <tr>
        <th>Type</th>
        <th>Index</th>
        <th>Name</th>
        <th>Description</th>
        <th>Format/Example</th>
        <th>Scope</th>
        <th>Status</th>
        <th>Comments</th>
    </tr>
    </thead>
    <tbody>
        @foreach($gaElements as $gaElement)
            @if (!$gaElement->section)
                @include('exports.partials.ga-elements-body')
            @endif
            @if ($gaElement->section)
                @include('exports.partials.section', ['attribute' => $gaElement])
            @endif
        @endforeach
    </tbody>
</table>
