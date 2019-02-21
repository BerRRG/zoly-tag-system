<div data-repeater-item="">
<div class="row">
    <div class="col-sm-1">
        <div class="form-group">
            {{ form::label('attribute[0][priority]', 'Priority') }}
            {{ form::text('attribute[0][priority]', input::old('attribute[0][priority]'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][reference_link_page]', 'Reference Link Page') }}
            {{ form::text('attribute[0][reference_link_page]', input::old('attribute[0][reference_link_page]'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][description_when]', 'Description (Quando)') }}
            {{ form::text('attribute[0][description_when]', input::old('attribute[0][description_when]'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][description_where]', 'Description (Onde)') }}
            {{ form::text('attribute[0][description_where]', input::old('attribute[0][description_where]'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            {{ form::label('attribute[0][description_button]', 'Description(Titulo ou nome do botão/link)') }}
            {{ form::text('attribute[0][description_button]', input::old('attribute[0][description_button]'), array('class' => 'form-control')) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][data_layer_data_attribute]', 'dataLayer ou data-attributes') }}
            {{ form::select('attribute[0][data_layer_data_attribute]', $webAttribute->dataTypes, input::old('attribute[0][data_layer_data_attribute]'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][data_layer_event]', 'dataLayer event(se necessario)') }}
            {{ form::select('attribute[0][data_layer_event]', $webAttribute->dataTypes, input::old('attribute[0][data_layer_event]'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="col-sm-2">
        {{ form::label('attribute[0][status_implemetation_data_layer_data_attribute]', 'Status Implementation dataLayer ou data-attributes', ['class' => ' col-2 text-truncate']) }}
            {{ form::select('attribute[0][status_implemetation_data_layer_data_attribute]', $webAttribute->implementationStatus, input::old('attribute[0][status_implemetation_data_layer_data_attribute]'), array('class' => 'form-control')) }}
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            {{ form::label('attribute[0][status_implementation_tag_manager]', 'Status Implementation TagManager') }}
            {{ form::select('attribute[0][status_implementation_tag_manager]', $webAttribute->implementationStatus, input::old('attribute[0][status_implementation_tag_manager]'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            {{ form::label('attribute[0][status_google_analytics]', 'Status Google Analytics') }}
            {{ form::select('attribute[0][status_google_analytics]', $webAttribute->implementationStatus, input::old('attribute[0][status_google_analytics]'), array('class' => 'form-control')) }}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][track_type]', 'Track Type') }}
            {{ form::select('attribute[0][track_type]', $webAttribute->trackType, input::old('attribute[0][track_type]'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][tag_name]', 'Tag Name') }}
            {{ form::text('attribute[0][tag_name]', input::old('attribute[0][tag_name]'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][fields_to_set]', 'Fields to Set') }}
            {{ form::text('attribute[0][fields_to_set]', input::old('attribute[0][fields_to_set]'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][event_category]', 'Event Category') }}
            {{ form::text('attribute[0][event_category]', input::old('attribute[0][event_category]'), array('class' => 'form-control')) }}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][event_action]', 'Event Action') }}
            {{ form::text('attribute[0][event_action]', input::old('attribute[0][event_action]'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][event_label_var]', 'Event Label/Var') }}
            {{ form::text('attribute[0][event_label_var]', input::old('attribute[0][event_label_var]'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][event_value]', 'Event Value') }}
            {{ form::text('attribute[0][event_value]', input::old('attribute[0][event_value]'), array('class' => 'form-control')) }}
        </div>
    </div>
</div>
<h2>Custom Dimensions</h2>
<div class="dimension-repeater">
  <div data-repeater-list="attribute-dimensions" class="drag">
    <div data-repeater-item="">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][dimensions][0][label]', 'Descrição') }}
                    {{ form::text('attribute[0][dimensions][0][label]', input::old('attribute[0][dimensions][0][label]'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][dimensions][0][variable]', 'Variável') }}
                    {{ form::text('attribute[0][dimensions][0][variable]', input::old('attribute[0][dimensions][0][variable]'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][dimensions][0][name]', 'Exemplo') }}
                    {{ form::text('attribute[0][dimensions][0][name]', input::old('attribute[0][dimensions][0][name]'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <span data-repeater-delete="" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-remove"></span> Delete
                </span>
            </div>
       </div>
   </div>
 </div>
 <hr>
<div class="row form-group">
  <div class="col-sm-11">
  <span data-repeater-create="" class="btn btn-info btn-md">
      <span class="glyphicon glyphicon-plus"></span> Add
  </span>
  </div>
</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][additional]', 'Additional') }}
            {{ form::text('attribute[0][additional]', input::old('attribute[0][additional]'), array('class' => 'form-control')) }}
        </div>
    </div>
</div>

<h2>Comentarios</h2>
<div class="inner-repeater">
  <div data-repeater-list="attribute-comments" class="drag">
    <div data-repeater-item="">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][comments][0][variable]', 'Variável') }}
                    {{ form::text('attribute[0][comments][0][variable]', input::old('attribute[0][comments][0][variable]'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][comments][0][example]', 'Exemplo') }}
                    {{ form::text('attribute[0][comments][0][example]', input::old('attribute[0][comments][0][example]'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][comments][0][description]', 'Descrição') }}
                    {{ form::text('attribute[0][comments][0][description]', input::old('attribute[0][comments][0][description]'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][comments][0][note]', 'Observação') }}
                    {{ form::text('attribute[0][comments][0][note]', input::old('attribute[0][comments][0][note]'), array('class' => 'form-control')) }}
                </div>
            </div>
       </div>
       <div class="row">
            <div class="col-sm-2">
                <span data-repeater-delete="" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-remove"></span> Delete
                </span>
            </div>
       </div>
   </div>
 </div>
 <hr>
<div class="row form-group">
  <div class="col-sm-11">
  <span data-repeater-create="" class="btn btn-info btn-md">
      <span class="glyphicon glyphicon-plus"></span> Add
  </span>
  </div>
</div>
</div>
<h2>Seção</h2>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {{ form::label('attribute[0][section]', 'Section') }}
            {{ form::text('attribute[0][section]', input::old('attribute[0][Section]'), array('class' => 'form-control')) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <span data-repeater-delete="" class="btn btn-danger btn-sm">
        <span class="glyphicon glyphicon-remove"></span> Delete
        </span>
    </div>
</div>
<hr>
</div>
