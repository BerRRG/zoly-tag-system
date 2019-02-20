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
            repeaters: [{
                selector: '.inner-repeater'
            }]
        });

        jQuery(".drag").sortable({
            axis: "y",
            cursor: 'pointer',
            opacity: 0.5,
            placeholder: "row-dragging",
            delay: 150,
            update: function(event, ui) {
            }

        }).disableSelection();
    }

</script>

<div class="container">
    <p class="title">Cadastro de Tag Book</p>
    <hr>
    <a class="btn btn-secondary caption menu" href="{{ URL::to('tag-books') }}">Listar Tag Books</a>
    {{ Html::ul($errors->all()) }}
    {{ Form::open(array('url' => 'tag-books')) }}

    <h1>Cover</h1>
    <div class="painel panel-primary register">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('client_name', 'Client name') }}
                    {{ Form::text('client_name', Input::old('client_name'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('project_name', 'Project name') }}
                    {{ Form::text('project_name', Input::old('project_name'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('user_name', 'User name') }}
                    {{ Form::text('user_name', Input::old('user_name'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('user_mail', 'User e-mail') }}
                    {{ Form::text('user_mail', Input::old('user_mail'), array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('ga_code', 'GA code') }}
                    {{ Form::text('ga_code', Input::old('ga_code'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('gtm_code', 'GTM code') }}
                    {{ Form::text('gtm_code', Input::old('gtm_code'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('url', 'Url') }}
                    {{ Form::text('url', Input::old('url'), array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h1>Tagging Plan</h1>
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
                    {{ form::text('attribute[0][data_layer_data_attribute]', input::old('attribute[0][data_layer_data_attribute]'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
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

            <div class="col-sm-2">
                <div class="form-group">
                    {{ form::label('attribute[0][track_type]', 'Track Type') }}
                    {{ form::select('attribute[0][track_type]', $webAttribute->trackType, input::old('attribute[0][track_type]'), array('class' => 'form-control')) }}
                </div>
            </div>
        </div>

        <div class="row">
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

            <div class="col-sm-3">
                <div class="form-group">
                    {{ form::label('attribute[0][event_action]', 'Event Action') }}
                    {{ form::text('attribute[0][event_action]', input::old('attribute[0][event_action]'), array('class' => 'form-control')) }}
                </div>
            </div>
        </div>

        <div class="row">
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
    <hr>
    <h1>GA Elements</h1>
    <div class="repeater-default">
      <div data-repeater-list="ga-element" class="drag">
        <div data-repeater-item="">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_element[0][type]', 'Type') }}
                        {{ form::text('ga_element[0][type]', input::old('ga_element[0][type]'), array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_element[0][index]', 'Index') }}
                        {{ form::text('ga_element[0][index]', input::old('ga_element[0][index]'), array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_element[0][name]', 'Name') }}
                        {{ form::text('ga_element[0][name]', input::old('ga_element[0][name]'), array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_element[0][description]', 'Description') }}
                        {{ form::text('ga_element[0][description]', input::old('ga_element[0][description]'), array('class' => 'form-control')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_element[0][format_example]', 'Format / Example') }}
                        {{ form::text('ga_element[0][format_example]', input::old('ga_element[0][format_example]'), array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    {{ form::label('ga_element[0][scope]', 'Scope', ['class' => ' col-3 text-truncate']) }}
                    {{ form::select('ga_element[0][scope]', $gaElementModel->scopeStatus, input::old('ga_element[0][scope]'), array('class' => 'form-control')) }}
                </div>
                <div class="col-sm-3">
                    {{ form::label('ga_element[0][status]', 'Status', ['class' => ' col-3 text-truncate']) }}
                    {{ form::select('ga_element[0][status]', $gaElementModel->implementationStatus, input::old('ga_element[0][status]'), array('class' => 'form-control')) }}
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_element[0][comment]', 'Comment') }}
                        {{ form::text('ga_element[0][comment]', input::old('ga_element[0][comment]'), array('class' => 'form-control')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_element[0][section]', 'Section') }}
                        {{ form::text('ga_element[0][section]', input::old('ga_element[0][section]'), array('class' => 'form-control')) }}
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
      </br>
      <div class="row form-group">
          <div class="col-sm-11">
          <span data-repeater-create="" class="btn btn-info btn-md">
              <span class="glyphicon glyphicon-plus"></span> Add
          </span>
          </div>
      </div>
    </div>
    <h1>GA Goals</h1>
    <div class="repeater-default">
      <div data-repeater-list="ga-goals" class="drag">
        <div data-repeater-item="">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_goal[0][ga_index]', 'GA-Index ID') }}
                        {{ form::text('ga_goal[0][ga_index]', input::old('ga_goal[0][ga_index]'), array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_goal[0][name]', 'Name') }}
                        {{ form::text('ga_goal[0][name]', input::old('ga_goal[0][name]'), array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_goal[0][description]', 'Description') }}
                        {{ form::text('ga_goal[0][description]', input::old('ga_goal[0][descripton]'), array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_goal[0][type]', 'Type') }}
                        {{ form::text('ga_goal[0][type]', input::old('ga_goal[0][type]'), array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('ga_goal[0][condition_rules]', 'Condition Rules') }}
                        {{ form::text('ga_goal[0][condition_rules]', input::old('ga_goal[0][condition_rules]'), array('class' => 'form-control')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    {{ form::label('ga_goal[0][status]', 'Status', ['class' => ' col-3 text-truncate']) }}
                    {{ form::select('ga_goal[0][status]', $gaGoalModel->implementationStatus, input::old('ga_goal[0][status]'), array('class' => 'form-control')) }}
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-sm-2">
                    <span data-repeater-delete="" class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-remove"></span> Delete
                    </span>
                </div>
            </div>
        </div>
      </div>
      </br>
      <div class="row form-group">
          <div class="col-sm-11">
          <span data-repeater-create="" class="btn btn-info btn-md">
              <span class="glyphicon glyphicon-plus"></span> Add
          </span>
          </div>
      </div>
    </div>
    <h1>References</h1>
    <div class="repeater-default">
      <div data-repeater-list="references" class="drag">
        <div data-repeater-item="">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('references[0][name]', 'Name') }}
                        {{ form::text('references[0][name]', input::old('references[0][name]'), array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('references[0][url]', 'Url') }}
                        {{ form::text('references[0][url]', input::old('references[0][url]'), array('class' => 'form-control')) }}
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
      </br>
      <div class="row form-group">
          <div class="col-sm-11">
          <span data-repeater-create="" class="btn btn-info btn-md">
              <span class="glyphicon glyphicon-plus"></span> Add
          </span>
          </div>
      </div>
    </div>



    {{ Form::submit('Salvar Tag Book', array('class' => 'btn btn-primary buttonCad')) }}
{{ Form::close() }}

<br/>
</div>
</body>
</html>
