<table>
    <thead>
    <tr>
        <th>GA - Index ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Type</th>
        <th>Conditions Rules</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
        @foreach($gaGoals as $gaGoal)
            @include('exports.partials.ga-goals-body')
        @endforeach
    </tbody>
</table>
