@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


@php use App\Models\Hotel @endphp


<!-- MUESTRA LOS HOTELES RECOMENDADOS - SEGÚN SUS GUSTOS -->


<div class="container">
    <div class="row">
        @foreach ($respuesta_3 as $hotel => $puntaje)
            <div class="col-3 py-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">{{ Hotel::getNombre($hotel) }}</div>
                    <img src="{{ asset("storage/fotos/download.jpg") }}" class="card-img-top" alt="Imagen no cargada">
                    <div class="card-body">
                        <h5 class="card-title">{{ $hotel }}</h5>
                        <p class="card-text"> TIPO: {{ Hotel::getTipo($hotel) }} <br/> ID: {{ Hotel::getRuc($hotel) }} <br/> PUNTAJE: {{number_format($puntaje,2)}} </p>
                        <form action="{{ route('hotel',['ruc_hotel' => Hotel::getRuc($hotel), 'id_user' => auth()->user()->id]) }}">
                            <input type="text" name="id_user" value=" {{ auth()->user()->id }}" hidden>
                            <input type="text" name="id_hotel" value="{{ Hotel::getRuc($hotel) }}" hidden>
                            <input class="btn btn-primary" type="submit" value="Enviar">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<!-- LO QUE SE DEBE MOSTRAR -->
<div class="container">
    <div class="row">

        <div class="col-3">
            <div class="card">
                <div class="card-header">Hotel Los Amantes</div>
                <img src="{{ asset('storage/fotos/Fondo-1.jpg') }}" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Lo mejor de lo Mejor</h5>
                    <p class="card-text">Nos especializamos en mostrar al cliente todo tipo de habitaciones.</p>
                    
                    <!-- BOTÓN - QUE ENVIA - ID DE USUARIO E RUC DE HOTEL --> 
                    <a class="btn btn-primary" href="{{ route('hotel',['id_user' => auth()->user()->id, 'ruc_hotel' => "1167877469565"]) }}">Mostrar</a>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
