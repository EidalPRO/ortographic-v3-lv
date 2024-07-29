@extends('layouts.est')
@section('nav')
    <a href="{{ route('sala.global') }}" class="nav-link nav-profile d-flex align-items-center pe-0">Regresar</a>
@endsection
@section('name-sala')
    <div class="pagetitle">
        <h1>Sala Global</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Código de sala </a></li>
                <li class="breadcrumb-item active">ORT001</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('usuarios-sala')
    <!-- Customers Card -->
    <div class="col-12 col-lg-3">

        <div class="card info-card customers-card">

            <div class="card-body">
                <h5 class="card-title">Usuarios <span>| En sala</span></h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $numUsuariosEnSala }}</h6>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- End Customers Card -->
@endsection
@section('dificut')
    <th scope="col">Facíl</th>
    <th scope="col">Medio</th>
    <th scope="col">Dificil</th>
@endsection
@section('est-general')
    @if ($porcentajeEfectividadGeneral->isEmpty())
        <tr>
            <td colspan="4">No hay estadísticas generales disponibles.</td>
        </tr>
    @else
        @foreach ($porcentajeEfectividadGeneral as $efectividad)
            @php
                $usuario = \App\Models\User::find($efectividad->user_id);
                $estatus = '';
                $badgeClass = '';

                if ($efectividad->porcentaje_efectividad < 30) {
                    $estatus = 'Bajo';
                    $badgeClass = 'badge bg-danger';
                } elseif ($efectividad->porcentaje_efectividad < 70) {
                    $estatus = 'Medio';
                    $badgeClass = 'badge bg-warning';
                } else {
                    $estatus = 'Bueno';
                    $badgeClass = 'badge bg-success';
                }
            @endphp
            <tr>
                <td>{{ $usuario ? $usuario->name : 'Usuario no encontrado' }}</td>
                <td>{{ $efectividad->porcentaje_efectividad }}%</td>
                <td>{{ $efectividad->tiempo }} segundos</td>
                <td><span class="{{ $badgeClass }}">{{ $estatus }}</span></td>
            </tr>
        @endforeach
    @endif
@endsection
@section('est-detallado')
    @if (empty($estadisticasDetalladas))
        <tr>
            <td colspan="5">No hay estadísticas detalladas disponibles.</td>
        </tr>
    @else
        @foreach ($estadisticasDetalladas as $usuario => $temas)
            @foreach ($temas as $tema => $dificultades)
                <tr>
                    <td>{{ $usuario }}</td>
                    <td>
                        @if ($tema === 'gramaticaGeneral')
                            Gramática General
                        @elseif ($tema === 'acentuacion')
                            Acentuación
                        @elseif ($tema === 'letras')
                            Uso de Letras
                        @else
                            {{ ucfirst($tema) }}
                        @endif
                    </td>
                    <td>{{ isset($dificultades['facil']) ? $dificultades['facil'] . '%' : '0%' }}</td>
                    <td>{{ isset($dificultades['medio']) ? $dificultades['medio'] . '%' : '0%' }}</td>
                    <td>{{ isset($dificultades['dificil']) ? $dificultades['dificil'] . '%' : '0%' }}</td>
                </tr>
            @endforeach
        @endforeach
    @endif
@endsection
