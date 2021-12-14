@extends('frontend.common.template')

@section('content')

    <div class="contato">
        
        <div class="elfsight-app-334668a3-3db5-418d-a1ad-44ac99acf2fb" style="background-color:white;border-radius:10px;"></div>
        
        <div class="info">
            <h6>Para contato:</h6>
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
            <div class="mapa">
                {!! $contato->google_maps !!}
            </div>
        </div>
                    
    </div>

@endsection
