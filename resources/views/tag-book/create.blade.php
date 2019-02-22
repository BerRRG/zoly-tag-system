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
            },{
                selector: '.dimension-repeater'
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
            @include('tag-book.partials.default-item-clone-web-attribute-item')
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
