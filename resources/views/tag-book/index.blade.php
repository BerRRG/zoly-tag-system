<!DOCTYPE html>
<html>
    @include('head');
<body>
<div class="container">

    <p class="title">Listagem de Tag Book</p>
    <hr>
    <a class="btn btn-primary caption menu"  href="{{ URL::to('tag-books/create') }}">Criar Tag Book</a>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table id="registration-tables" class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome do cliente</td>
        </tr>
    </thead>
    <tbody>
    @foreach($tagBooks as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->client_name }}</td>

            <td>
                <div class="pull-right">
                    <a class="btn btn-small btn-info" href="{{ URL::to('tag-books/' . $value->id . '/edit') }}">Editar</a>


                    <a class="btn btn-small btn-success" href="{{ URL::to('tag-books/' . $value->id . '/export') }}">Gerar</a>

                    {{ Form::open(array('url' => 'tag-books/' . $value->id, 'class' => 'btn')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Apagar', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
