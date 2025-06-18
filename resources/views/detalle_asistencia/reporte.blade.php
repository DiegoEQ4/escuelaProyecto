@php
    $numeral = 1;
@endphp

<h2 style="text-align:center; font-weight:bold; margin-top: 20px;">Administración de Asistencias</h2>

<form method="post" action="{{ route('detalle_asistencia.store') }}">
    @csrf
    <table style="width: 90%; margin: 30px auto; border-collapse: collapse; border-radius: 10px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <thead style="background-color: #343a40; color: white;">
            <tr>
                <th style="padding: 12px;">#</th>
                <th style="padding: 12px;">Estudiante</th>
                <th style="padding: 12px;">Estado</th>
                <th style="padding: 12px;">Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalles as $i => $detalle)        
                <tr style="background-color: {{ $loop->index % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                    <td style="padding: 10px; text-align: center;">{{ $numeral++ }}</td>
                    <td style="padding: 10px; text-align: center;">{{ $detalle->carnetEstudiante }}</td>
                    <td style="padding: 10px; text-align: center;">
                        {{ (int)$detalle->estado === 0 ? 'Indefinido' : '' }}
                        {{ (int)$detalle->estado === 1 ? 'Presente' : '' }}
                        {{ (int)$detalle->estado === 2 ? 'Permiso' : '' }}
                        {{ (int)$detalle->estado === 3 ? 'Ausente' : '' }}
                    </td>
                    <td style="padding: 10px; text-align: center;">{{ $detalle->detalle }}</td>
                </tr>              
            @endforeach
        </tbody>
    </table>
</form>
