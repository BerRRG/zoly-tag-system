<!DOCTYPE html>
<html>
@include('head')
<body>
<div class="container">

        <p class="title">Detalhes do Consultório</p>
        <hr>
        <a class="btn btn-primary caption menu" href="{{ URL::to('tag-books') }}">Listar consultórios</a></li>
        <a class="btn btn-primary caption menu" href="{{ URL::to('tag-books/create') }}">Adicionar consultório</a>


    <div class="panel panel-primary register">
        <p class="title-detail">{{ $tagBook->name }}</p>
    </div>
    <div>
        <a class="btn btn-small btn-primary" href="{{ URL::to('tag-books') }}">Voltar</a>
    </div>
<br/>
</div>
</body>
</html>
