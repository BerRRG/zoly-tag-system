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
