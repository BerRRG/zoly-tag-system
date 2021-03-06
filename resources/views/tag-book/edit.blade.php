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
    <a class="btn btn-primary caption menu" href="{{ URL::to('tag-books') }}">Listar Tag Books</a>
    {{ Html::ul($errors->all()) }}
    {{ Form::open(['method' => 'PUT', 'route' => ['tag-books.update', $tagBook->id]]) }}

    <div class="painel panel-primary register">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('client_name', 'Client name') }}
                    {{ Form::text('client_name', Input::old('client_name') ? Input::old('client_name') : $tagBook->client_name, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('project_name', 'Project name') }}
                    {{ Form::text('project_name', Input::old('project_name') ? Input::old('project_name') : $tagBook->project_name , array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('user_name', 'User name') }}
                    {{ Form::text('user_name', Input::old('user_name') ? Input::old('user_name') : $tagBook->user_name, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('user_mail', 'User e-mail') }}
                    {{ Form::text('user_mail', Input::old('user_mail') ? Input::old('user_mail') : $tagBook->user_mail, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('ga_code', 'GA code') }}
                    {{ Form::text('ga_code', Input::old('ga_code') ? Input::old('ga_code') : $tagBook->ga_code, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('gtm_code', 'GTM code') }}
                    {{ Form::text('gtm_code', Input::old('gtm_code') ? Input::old('gtm_code') : $tagBook->gtm_code, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('url', 'Url') }}
                    {{ Form::text('url', Input::old('url') ? Input::old('url') : $tagBook->url, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div>
    <div class="repeater-default">
      <div data-repeater-list="attribute" class="drag">
          @foreach($webAttributes as $key => $webAttribute)
            <div data-repeater-item="">
            <input type="hidden" value="{{$webAttribute->id}}" name="attribute[{{$key}}][id]">
            <div class="row">
                <div class="col-sm-1">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][priority]', 'Priority') }}
                        {{ form::text('attribute['.$key.'][priority]', input::old('attribute['.$key.'][priority]') ? input::old('attribute['.$key.'][priority]') : $webAttribute->priority, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][reference_link_page]', 'Reference Link Page') }}
                        {{ form::text('attribute['.$key.'][reference_link_page]', input::old('attribute['.$key.'][reference_link_page]')? input::old('attribute['.$key.'][reference_link_page]') : $webAttribute->reference_link_page , array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][description_when]', 'Description (Quando)') }}
                        {{ form::text('attribute['.$key.'][description_when]', input::old('attribute['.$key.'][description_when]') ? input::old('attribute['.$key.'][description_when]') : $webAttribute->description_when, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][description_where]', 'Description (Onde)') }}
                        {{ form::text('attribute['.$key.'][description_where]', input::old('attribute['.$key.'][description_where]') ? input::old('attribute['.$key.'][description_where]') : $webAttribute->description_where, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][description_button]', 'Description (Titulo ou nome do botão/link)') }}
                        {{ form::text('attribute['.$key.'][description_button]', input::old('attribute['.$key.'][description_button]') ? input::old('attribute['.$key.'][description_button]') : $webAttribute->description_button, array('class' => 'form-control')) }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][data_layer_data_attribute]', 'dataLayer ou data-attributes') }}
                        {{ form::text('attribute['.$key.'][data_layer_data_attribute]', input::old('attribute['.$key.'][data_layer_data_attribute]') ? input::old('attribute['.$key.'][data_layer_data_attribute]') : $webAttribute->data_layer_data_attribute, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-sm-3">
                    {{ form::label('attribute['.$key.'][status_implemetation_data_layer_data_attribute]', 'Status Implementation dataLayer ou data-attributes', ['class' => ' col-2 text-truncate']) }}
                    {{ form::select('attribute['.$key.'][status_implemetation_data_layer_data_attribute]', $webAttribute->implementationStatus, input::old('attribute['.$key.'][status_implemetation_data_layer_data_attribute]') ? input::old('attribute['.$key.'][status_implemetation_data_layer_data_attribute]') : $webAttribute->status_implementation_data_layer_data_attribute, array('class' => 'form-control')) }}
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][status_implementation_tag_manager]', 'Status Implementation TagManager') }}
                        {{ form::select('attribute['.$key.'][status_implementation_tag_manager]', $webAttribute->implementationStatus, input::old('attribute['.$key.'][status_implementation_tag_manager]') ? input::old('attribute['.$key.'][status_implementation_tag_manager]') : $webAttribute->status_implementation_tag_manager, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][status_google_analytics]', 'Status Google Analytics') }}
                        {{ form::select('attribute['.$key.'][status_google_analytics]', $webAttribute->implementationStatus, input::old('attribute['.$key.'][status_google_analytics]') ? input::old('attribute['.$key.'][status_google_analytics]') : $webAttribute->status_google_analytics, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][track_type]', 'Track Type') }}
                        {{ form::select('attribute['.$key.'][track_type]', $webAttribute->trackType, input::old('attribute['.$key.'][track_type]') ? input::old('attribute['.$key.'][track_type]') : $webAttribute->track_type, array('class' => 'form-control')) }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][tag_name]', 'Tag Name') }}
                        {{ form::text('attribute['.$key.'][tag_name]', input::old('attribute['.$key.'][tag_name]') ? input::old('attribute['.$key.'][tag_name]') : $webAttribute->tag_name, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][fields_to_set]', 'Fields to Set') }}
                        {{ form::text('attribute['.$key.'][fields_to_set]', input::old('attribute['.$key.'][fields_to_set]') ? input::old('attribute['.$key.'][fields_to_set]') : $webAttribute->fields_to_set, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][event_category]', 'Event Category') }}
                        {{ form::text('attribute['.$key.'][event_category]', input::old('attribute['.$key.'][event_category]') ? input::old('attribute['.$key.'][event_category]') : $webAttribute->event_category, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][event_action]', 'Event Action') }}
                        {{ form::text('attribute['.$key.'][event_action]', input::old('attribute['.$key.'][event_action]') ? input::old('attribute['.$key.'][event_action]') : $webAttribute->event_action, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][event_label_var]', 'Event Label/Var') }}
                        {{ form::text('attribute['.$key.'][event_label_var]', input::old('attribute['.$key.'][event_label_var]') ? input::old('attribute['.$key.'][event_label_var]') : $webAttribute->event_label_var, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][event_value]', 'Event Value') }}
                        {{ form::text('attribute['.$key.'][event_value]', input::old('attribute['.$key.'][event_value]') ? input::old('attribute['.$key.'][event_value]') : $webAttribute->event_value, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][custom_dimension_metrics]', 'Custom Dimensions & Metrics') }}
                        {{ form::text('attribute['.$key.'][custom_dimension_metrics]', input::old('attribute['.$key.'][custom_dimension_metrics]') ? input::old('attribute['.$key.'][custom_dimension_metrics]') : $webAttribute->custom_dimension_metrics, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][additional]', 'Additional') }}
                        {{ form::text('attribute['.$key.'][additional]', input::old('attribute['.$key.'][additional]') ? input::old('attribute['.$key.'][additional]') : $webAttribute->additional, array('class' => 'form-control')) }}
                    </div>
                </div>
            </div>

            @foreach( $webAttribute->comments()->get() as $commentKey => $comment)
                <h2>Comentarios</h2>
                <div class="inner-repeater">
                  <div data-repeater-list="attribute-comments" class="drag">
                    <div data-repeater-item="">
                        <input type="hidden" value="{{$comment->id}}" name="attribute[{{$key}}][id]">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {{ form::label('attribute['.$key.'][comments]['.$commentKey.'][variable]', 'Variável') }}
                                    {{ form::text('attribute['.$key.'][comments]['.$commentKey.'][variable]', input::old('attribute['.$key.'][comments]['.$commentKey.'][variable]') ? input::old('attribute['.$key.'][comments]['.$commentKey.'][variable]') : $comment->variable, array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {{ form::label('attribute['.$key.'][comments]['.$commentKey.'][example]', 'Exemplo') }}
                                    {{ form::text('attribute['.$key.'][comments]['.$commentKey.'][example]', input::old('attribute['.$key.'][comments]['.$commentKey.'][example]') ? input::old('attribute['.$key.'][comments]['.$commentKey.'][example]') : $comment->example, array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {{ form::label('attribute['.$key.'][comments]['.$commentKey.'][description]', 'Descrição') }}
                                    {{ form::text('attribute['.$key.'][comments]['.$commentKey.'][description]', input::old('attribute['.$key.'][comments]['.$commentKey.'][description]') ? input::old('attribute['.$key.'][comments]['.$commentKey.'][description]') : $comment->description, array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {{ form::label('attribute['.$key.'][comments]['.$commentKey.'][note]', 'Observação') }}
                                    {{ form::text('attribute['.$key.'][comments]['.$commentKey.'][note]', input::old('attribute['.$key.'][comments]['.$commentKey.'][note]') ? input::old('attribute['.$key.'][comments]['.$commentKey.'][note]') : $comment->note, array('class' => 'form-control')) }}
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
           @endForeach
           <h2>Seção</h2>
           <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{ form::label('attribute['.$key.'][section]', 'Section') }}
                        {{ form::text('attribute['.$key.'][section]', input::old('attribute['.$key.'][Section]') ? input::old('attribute['.$key.'][Section]') : $webAttribute->section, array('class' => 'form-control')) }}
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
            @endforeach
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

    <h1>GA Elements</h1>
    <div class="repeater-default">
      <div data-repeater-list="ga-element" class="drag">
          @foreach($gaElements as $key => $gaElement)
            <div data-repeater-item="">
                <input type="hidden" value="{{$gaElement->id}}" name="attribute[{{$key}}][id]">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_element['.$key.'][type]', 'Type') }}
                            {{ form::text('ga_element['.$key.'][type]', input::old('ga_element['.$key.'][type]') ? input::old('ga_element['.$key.'][type]') :$gaElement->type, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_element['.$key.'][index]', 'Index') }}
                            {{ form::text('ga_element['.$key.'][index]', input::old('ga_element['.$key.'][index]') ? input::old('ga_element['.$key.'][index]') : $gaElement->index, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_element['.$key.'][name]', 'Name') }}
                            {{ form::text('ga_element['.$key.'][name]', input::old('ga_element['.$key.'][name]') ? input::old('ga_element['.$key.'][name]') : $gaElement->name, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_element['.$key.'][description]', 'Description') }}
                            {{ form::text('ga_element['.$key.'][description]', input::old('ga_element['.$key.'][description]') ? input::old('ga_element['.$key.'][description]') : $gaElement->description, array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_element['.$key.'][format_example]', 'Format / Example') }}
                            {{ form::text('ga_element['.$key.'][format_example]', input::old('ga_element['.$key.'][format_example]') ? input::old('ga_element['.$key.'][format_example]') : $gaElement->format_example, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        {{ form::label('ga_element[0][scope]', 'Scope', ['class' => ' col-3 text-truncate']) }}
                        {{ form::select('ga_element[0][scope]', $gaElementModel->scopeStatus, input::old('ga_element[0][scope]') ? input::old('ga_element[0][scope]') : $gaElement->scope, array('class' => 'form-control')) }}
                    </div>
                    <div class="col-sm-3">
                        {{ form::label('ga_element[0][status]', 'Status', ['class' => ' col-3 text-truncate']) }}
                        {{ form::select('ga_element[0][status]', $gaElementModel->implementationStatus, input::old('ga_element[0][status]') ? input::old('ga_element[0][status]') : $gaElement->status, array('class' => 'form-control')) }}
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_element['.$key.'][comment]', 'Comment') }}
                            {{ form::text('ga_element['.$key.'][comment]', input::old('ga_element['.$key.'][comment]') ? input::old('ga_element['.$key.'][comment]') : $gaElement->comment, array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_element['.$key.'][section]', 'Section') }}
                            {{ form::text('ga_element['.$key.'][section]', input::old('ga_element['.$key.'][section]') ? input::old('ga_element['.$key.'][section]') : $gaElement->section, array('class' => 'form-control')) }}
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
            </br>
        @endforeach
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
          @foreach($gaGoals as $key => $gaGoal)
            <div data-repeater-item="">
            <input type="hidden" value="{{$gaGoal->id}}" name="attribute[{{$key}}][id]">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_goal['.$key.'][ga_index]', 'GA-Index ID') }}
                            {{ form::text('ga_goal['.$key.'][ga_index]', input::old('ga_goal['.$key.'][ga_index]') ? input::old('ga_goal['.$key.'][ga_index]') : $gaGoal->ga_index, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_goal['.$key.'][name]', 'Name') }}
                            {{ form::text('ga_goal['.$key.'][name]', input::old('ga_goal['.$key.'][name]') ? input::old('ga_goal['.$key.'][name]') : $gaGoal->name, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_goal['.$key.'][description]', 'Description') }}
                            {{ form::text('ga_goal['.$key.'][description]', input::old('ga_goal['.$key.'][descripton]') ? input::old('ga_goal['.$key.'][descripton]') : $gaGoal->description, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_goal['.$key.'][type]', 'Type') }}
                            {{ form::text('ga_goal['.$key.'][type]', input::old('ga_goal['.$key.'][type]') ? input::old('ga_goal['.$key.'][type]') : $gaGoal->type, array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('ga_goal['.$key.'][condition_rules]', 'Condition Rules') }}
                            {{ form::text('ga_goal['.$key.'][condition_rules]', input::old('ga_goal['.$key.'][condition_rules]') ? input::old('ga_goal['.$key.'][condition_rules]') : $gaGoal->condition_rules, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        {{ form::label('ga_goal[0][status]', 'Status', ['class' => ' col-3 text-truncate']) }}
                        {{ form::select('ga_goal[0][status]', $gaGoalModel->implementationStatus, input::old('ga_goal[0][status]') ? input::old('ga_goal[0][status]') : $gaGoal->status, array('class' => 'form-control')) }}
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
        @endforeach
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
          @foreach($references as $key => $reference)
            <div data-repeater-item="">
                <input type="hidden" value="{{$reference->id}}" name="attribute[{{$key}}][id]">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('references['.$key.'][name]', 'Name') }}
                            {{ form::text('references['.$key.'][name]', input::old('references['.$key.'][name]') ? input::old('references['.$key.'][name]') : $reference->name, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ form::label('references['.$key.'][url]', 'Url') }}
                            {{ form::text('references['.$key.'][url]', input::old('references['.$key.'][url]') ? input::old('references['.$key.'][url]') : $reference->url, array('class' => 'form-control')) }}
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
          @endforeach
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
