@extends('frontend.common.template')

@section('content')

    <div class="contato">
        <div class="center-full">
            <div class="form-wrapper">
                <div class="info">
                    <div class="contato-whatsapp">
                        @if($contato->telefone)
                            <p class="contato-telefone">{{ $contato->telefone }}</p>
                        @endif
                        @if($contato->whatsapp)
                            <a href="https://api.whatsapp.com/send?phone=55{{ $contato->whatsapp }}" class="whatsapp" target="_blank"><p>+55 {{ $contato->whatsapp }}</p></a>
                        @endif
                        @if($contato->endereco)
                            <div class="contato-endereco">{!! $contato->endereco !!}</div>
                        @endif
                        
                    </div>
                </div>

                <form action="{{ route('contato.post') }}" method="POST">
                    {!! csrf_field() !!}
                    @if(session('enviado'))
                    <div class="flash flash-success">Mensagem enviada com sucesso!</div>
                    @elseif($errors->any())
                    <div class="flash flash-error">Preencha todos os campos corretamente.</div>
                    @endif

                    <div>
                        <p class="contato-fale">FALE CONOSCO</p>
                        <div class="grid">
                            <div>
                                <input type="text" name="nome" placeholder="nome" value="{{ old('nome') }}" required>
                                <input type="email" name="email" placeholder="e-mail" value="{{ old('email') }}" required>
                                <input type="text" name="telefone" placeholder="telefone" value="{{ old('telefone') }}">
                            </div>
                            <textarea name="mensagem" placeholder="mensagem" required>{{ old('mensagem') }}</textarea>
                            <button type="submit"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="mapa">
            {!! $contato->google_maps !!}
        </div>
    </div>
    <script>
        var el13 = $("#telefone");
        if(el13){
            console.log("el13 ta on");
        }else{
            console.log("el13 ta off")
        }
    </script>

@endsection
