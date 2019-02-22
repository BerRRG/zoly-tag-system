<tr>
    <td>{{ $attribute->priority }}</td>
    <td>{{ $attribute->reference_link_page }}</td>
    <td style="wrap-text: true">
        <b>Quando:</b> {{ $attribute->description_when }}
        <br />
        <b>Onde:</b> {{ $attribute->description_where }}
        <br />
        <b>Título ou nome do botão/link:</b> {{ $attribute->description_button }}
    </td>
    <td>{{ $attribute->data_layer_data_attribute }}</td>
    <td>{{ $attribute->status_implementation_data_layer_data_attribute }}</td>
    <td>{{ $attribute->status_implementation_tag_manager }}</td>
    <td>{{ $attribute->status_google_analytics }}</td>
    <td>{{ $attribute->track_type }}</td>
    <td>{{ $attribute->tag_name }}</td>
    <td>
        {{ $attribute->fields_to_set_no_interaction }}
        <br />
        {{ $attribute->fields_to_set_type }}
        <br />
        {{ $attribute->fields_to_set_example }}
    </td>
    <td>{{ $attribute->event_category }}</td>
    <td>{{ $attribute->event_action }}</td>
    <td>{{ $attribute->event_label_var }}</td>
    <td>{{ $attribute->event_value }}</td>
    <td>
        @foreach($attribute->dimensions() as $dimension)
            {{ $dimension->label }}
            <br />
        @endforeach
    </td>
    <td>{{ $attribute->additional }}</td>
    <td>
        @foreach($attribute->comments()->get() as $comment)
            {{ $comment->variable}} - {{ $comment->description }} Ex: {{$comment->example}}
            <br />
            @if ($comment->note)
                OBS: {{$comment->note}}
            @endif
        @endforeach
    </td>
</tr>
