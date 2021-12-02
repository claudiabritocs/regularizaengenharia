@extends('painel.common.template')

@section('content')

    <legend>
        <h2>FAQ</h2>
    </legend>

    {!! Form::model($faqs, [
        'route'  => ['painel.faq.update', $faqs->id],
        'method' => 'patch',
        'files'  => true])
    !!}

    @include('painel.faq.form', ['submitText' => 'Alterar'])

    {!! Form::close() !!}

@endsection
