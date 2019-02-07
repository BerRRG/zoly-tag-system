<!DOCTYPE html>
<html>
    @include('head')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>

<script>
    window.onload = function() {
        var repeater = $('.repeater-default').repeater({
            initval: 1,
        });

        jQuery(".drag").sortable({
            axis: "y",
            cursor: 'pointer',
            opacity: 0.5,
            placeholder: "row-dragging",
            delay: 150,
            update: function(event, ui) {
            console.log('repeaterVal');
            console.log(repeater.repeaterVal());
            console.log('serializeArray');
            console.log(repeater.serializeArray());
            }

        }).disableSelection();
    }

</script>

<div class="container">
    <p class="title">Cadastro de Tag Book</p>
    <hr>
    <a class="btn btn-primary caption menu" href="{{ URL::to('tag-books') }}">Listar Tag Books</a>
{{ Html::ul($errors->all()) }}
{{ Form::open(array('url' => 'tag-books')) }}

    <div class="painel panel-primary register">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('name', 'Nome') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div>
    <div class="repeater-default">
      <div data-repeater-list="attribute" class="drag">
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
                    {{ form::label('attribute[0][description]', 'Description') }}
                    {{ form::text('attribute[0][description]', input::old('attribute[0][description]'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][data_layer_data_attribute]', 'dataLayer ou data-attributes') }}
                    {{ form::text('attribute[0][data_layer_data_attribute]', input::old('attribute[0][data_layer_data_attribute]'), array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="col-sm-2">
                {{ form::label('attribute[0][status_implemetation_data_layer_data_attribute]', 'Status Implementation dataLayer ou data-attributes', ['class' => ' col-2 text-truncate']) }}
                    {{ form::select('attribute[0][status_implemetation_data_layer_data_attribute]', $webAttribute->implementationStatus, input::old('attribute[0][status_implemetation_data_layer_data_attribute]'), array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="row">
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

            <div class="col-sm-2">
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
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][event_category]', 'Event Category') }}
                    {{ form::text('attribute[0][event_category]', input::old('attribute[0][event_category]'), array('class' => 'form-control')) }}
                </div>
            </div>

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

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][custom_dimension_metrics]', 'Custom Dimensions & Metrics') }}
                    {{ form::text('attribute[0][custom_dimension_metrics]', input::old('attribute[0][custom_dimension_metrics]'), array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][additional]', 'Additional') }}
                    {{ form::text('attribute[0][additional]', input::old('attribute[0][additional]'), array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][comments]', 'Comments') }}
                    {{ form::text('attribute[0][comments]', input::old('attribute[0][comments]'), array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][section]', 'Section') }}
                    {{ form::text('attribute[0][section]', input::old('attribute[0][Section]'), array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="col-sm-2">
                <span data-repeater-delete="" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-remove"></span> Delete
                </span>
            </div>
        </div>
        <hr>
        </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-11">
            <span data-repeater-create="" class="btn btn-info btn-md">
                <span class="glyphicon glyphicon-plus"></span> Add
            </span>
            </div>
        </div>
        </div>
    </div>
    {{ Form::submit('Salvar Tag Book', array('class' => 'btn btn-primary buttonCad')) }}

{{ Form::close() }}

<br/>
</div>
</body>
</html>
