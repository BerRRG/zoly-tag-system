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
    <a class="btn btn-primary caption menu" href="{{ URL::to('tag-books') }}">Listar Tag Books</a>
    {{ Html::ul($errors->all()) }}
    {{ Form::open(['method' => 'PUT', 'route' => ['tag-books.update', $tagBook->id]]) }}

    @include('tag-book.partials.basic-info-edit')

    @include('tag-book.partials.web-attribute-edit')

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
