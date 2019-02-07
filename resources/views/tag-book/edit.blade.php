<!DOCTYPE html>
<html>
    @include('head')
<body>
<div class="container">

        <p class="title">Editar: {{ $tagBook->name }}</p>
        <hr>
        <a class="btn btn-primary caption menu" href="{{ URL::to('tag-books') }}">Listar consultórios</a>
        <a class="btn btn-primary caption menu" href="{{ URL::to('tag-books/create') }}">Adicionar consultório</a>

{{ Html::ul($errors->all()) }}

{{ Form::model($tagBook, array('route' => array('tag-books.update', $tagBook->id), 'method' => 'PUT')) }}

    <div class="panel panel-primary register">
        <div class="form-group">
            {{ Form::label('name', 'Nome') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
    </div>
    {{ Form::submit('Inserir alterações', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

<br/>
</div>
</body>
</html>
