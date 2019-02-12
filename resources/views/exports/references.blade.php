<table>
    <thead>
    </thead>
    <tbody>
        @foreach($references as $reference)
            @include('exports.partials.references-body')
        @endforeach
    </tbody>
</table>
