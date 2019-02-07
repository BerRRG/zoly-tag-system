<table>
    <thead>
    <tr>
        <th>Priority</th>
        <th>Reference Link Page</th>
        <th>Description</th>
        <th>dataLayer ou data-attributes</th>
        <th>Status Implementation dataLayer ou data-attributes</th>
        <th>Status Implementation TagManager</th>
        <th>Status Google Analytics</th>
        <th>Track Type</th>
        <th>Tag Name</th>
        <th>>Fields to Set</th>
        <th>Event Category</th>
        <th>Event Action</th>
        <th>Event Label / Var</th>
        <th>Event Value</th>
        <th>Custom Dimensions / Metrics</th>
        <th>Additional</th>
        <th>Comments</th>
    </tr>
    </thead>
    <tbody>
        @foreach($attributes as $attribute)
            @if (!$attribute->section)
                @include('exports.partials.web-attributes-body')
            @endif
            @if ($attribute->section)
                @include('exports.partials.section')
            @endif
        @endforeach
    </tbody>
</table>
