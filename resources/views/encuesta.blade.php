@extends('layouts.app') <!-- Asume que tienes un layout base -->

@section('content')
<div class="container">
    <h1>Formulario de Registro</h1>
    <form action="{{ route('encuesta.store') }}" method="POST">
        @csrf <!-- Token de seguridad de Laravel -->

        <!-- Información Personal -->
        <fieldset>
            <legend>Información Personal</legend>
            <div>
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" value="{{ old('correo', $datos['correo'] ?? '') }}" required>
            </div>
 <!-- Selección de Grupo -->
<div>
    <label for="id_grupo">Grupo:</label>
    <select id="id_grupo" name="id_grupo" required>
        <option value="">Selecciona un grupo</option>
        @foreach($grupos as $grupo)
            <option value="{{ $grupo->_id }}" {{ (old('id_grupo', $datos['id_grupo'] ?? '')) == $grupo->_id ? 'selected' : '' }}>
                {{ $grupo->nombre }}
            </option>
        @endforeach
    </select>
</div>

<!-- Selección de Carrera -->
<div>
    <label for="id_carrera">Carrera:</label>
    <select id="id_carrera" name="id_carrera" required>
        <option value="">Selecciona una carrera</option>
        @foreach($carreras as $carrera)
            <option value="{{ $carrera->_id }}" {{ (old('id_carrera', $datos['id_carrera'] ?? '')) == $carrera->_id ? 'selected' : '' }}>
                {{ $carrera->nombre }}
            </option>
        @endforeach
    </select>
</div>
<div>
                <label for="id_alumno">Matricula:</label>
                <input type="text" id="id_alumno" name="id_alumno" value="{{ old('id_alumno', $datos['id_alumno'] ?? '') }}" required>
            </div>
            <div>
            <div>
                <label for="programa_educativo">Programa Educativo:</label>
                <input type="text" id="programa_educativo" name="programa_educativo" value="{{ old('programa_educativo', $datos['programa_educativo'] ?? '') }}" required>
            </div>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $datos['nombre'] ?? '') }}" required>
            </div>
            <div>
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno', $datos['apellido_paterno'] ?? '') }}" required>
            </div>
            <div>
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno', $datos['apellido_materno'] ?? '') }}" required>
            </div>
            <div>
                <label for="curp">CURP:</label>
                <input type="text" id="curp" name="curp" value="{{ old('curp', $datos['curp'] ?? '') }}" required>
            </div>
            <div>
                <label for="rfc">RFC:</label>
                <input type="text" id="rfc" name="rfc" value="{{ old('rfc', $datos['rfc'] ?? '') }}" required>
            </div>
            <div>
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option value="Masculino" {{ (old('sexo', $datos['sexo'] ?? '')) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ (old('sexo', $datos['sexo'] ?? '')) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>
            <div>
                <label for="genero">Género:</label>
                <select id="genero" name="genero" required>
                    <option value="Hombre" {{ (old('genero', $datos['genero'] ?? '')) == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                    <option value="Mujer" {{ (old('genero', $datos['genero'] ?? '')) == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                    <option value="Otro" {{ (old('genero', $datos['genero'] ?? '')) == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>
            <div>
                <label for="estado_civil">Estado Civil:</label>
                <select id="estado_civil" name="estado_civil" required>
                    <option value="Soltero" {{ (old('estado_civil', $datos['estado_civil'] ?? '')) == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                    <option value="Casado" {{ (old('estado_civil', $datos['estado_civil'] ?? '')) == 'Casado' ? 'selected' : '' }}>Casado</option>
                    <option value="Divorciado" {{ (old('estado_civil', $datos['estado_civil'] ?? '')) == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                    <option value="Viudo" {{ (old('estado_civil', $datos['estado_civil'] ?? '')) == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                </select>
            </div>
            <div>
                <label for="numero_hijos">Número de Hijos:</label>
                <input type="number" id="numero_hijos" name="numero_hijos" value="{{ old('numero_hijos', $datos['numero_hijos'] ?? '') }}" required>
            </div>
            <div>
                <label for="depende_economicamente">Dependencia Económica:</label>
                <input type="text" id="depende_economicamente" name="depende_economicamente" value="{{ old('depende_economicamente', $datos['depende_economicamente'] ?? '') }}" required>
            </div>
            <div>
                <label for="religion">Religión:</label>
                <input type="text" id="religion" name="religion" value="{{ old('religion', $datos['religion'] ?? '') }}" required>
            </div>
            <div>
                <label for="grupo_sanguineo">Grupo Sanguíneo:</label>
                <select id="grupo_sanguineo" name="grupo_sanguineo" required>
                    <option value="O+" {{ (old('grupo_sanguineo', $datos['grupo_sanguineo'] ?? '')) == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ (old('grupo_sanguineo', $datos['grupo_sanguineo'] ?? '')) == 'O-' ? 'selected' : '' }}>O-</option>
                    <option value="A+" {{ (old('grupo_sanguineo', $datos['grupo_sanguineo'] ?? '')) == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ (old('grupo_sanguineo', $datos['grupo_sanguineo'] ?? '')) == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ (old('grupo_sanguineo', $datos['grupo_sanguineo'] ?? '')) == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ (old('grupo_sanguineo', $datos['grupo_sanguineo'] ?? '')) == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{ (old('grupo_sanguineo', $datos['grupo_sanguineo'] ?? '')) == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ (old('grupo_sanguineo', $datos['grupo_sanguineo'] ?? '')) == 'AB-' ? 'selected' : '' }}>AB-</option>
                </select>
            </div>
            <div>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $datos['fecha_nacimiento'] ?? '') }}" required>
            </div>
            <div>
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" value="{{ old('edad', $datos['edad'] ?? '') }}" required>
            </div>
            <div>
                <label for="pais_nacimiento">País de Nacimiento:</label>
                <input type="text" id="pais_nacimiento" name="pais_nacimiento" value="{{ old('pais_nacimiento', $datos['pais_nacimiento'] ?? '') }}" required>
            </div>
            <div>
                <label for="estado_nacimiento">Estado de Nacimiento:</label>
                <input type="text" id="estado_nacimiento" name="estado_nacimiento" value="{{ old('estado_nacimiento', $datos['estado_nacimiento'] ?? '') }}" required>
            </div>
            <div>
                <label for="municipio_nacimiento">Municipio de Nacimiento:</label>
                <input type="text" id="municipio_nacimiento" name="municipio_nacimiento" value="{{ old('municipio_nacimiento', $datos['municipio_nacimiento'] ?? '') }}" required>
            </div>
            <div>
                <label for="telefono_celular">Teléfono Celular:</label>
                <input type="tel" id="telefono_celular" name="telefono_celular" value="{{ old('telefono_celular', $datos['telefono_celular'] ?? '') }}" required>
            </div>
            <div>
                <label for="telefono_casa">Teléfono de Casa:</label>
                <input type="tel" id="telefono_casa" name="telefono_casa" value="{{ old('telefono_casa', $datos['telefono_casa'] ?? '') }}">
            </div>
            <div>
                <label for="correo_personal">Correo Personal:</label>
                <input type="email" id="correo_personal" name="correo_personal" value="{{ old('correo_personal', $datos['correo_personal'] ?? '') }}" required>
            </div>
            <div>
                <label for="redes_sociales">Redes Sociales:</label>
                <input type="url" id="redes_sociales" name="redes_sociales" value="{{ old('redes_sociales', $datos['redes_sociales'] ?? '') }}">
            </div>
        </fieldset>

        <!-- Dirección -->
        <fieldset>
            <legend>Dirección</legend>
            <div>
                <label for="calle">Calle:</label>
                <input type="text" id="calle" name="direccion[calle]" value="{{ old('direccion.calle', $datos['direccion']['calle'] ?? '') }}" required>
            </div>
            <div>
                <label for="no_exterior">Número Exterior:</label>
                <input type="text" id="no_exterior" name="direccion[no_exterior]" value="{{ old('direccion.no_exterior', $datos['direccion']['no_exterior'] ?? '') }}" required>
            </div>
            <div>
                <label for="no_interior">Número Interior:</label>
                <input type="text" id="no_interior" name="direccion[no_interior]" value="{{ old('direccion.no_interior', $datos['direccion']['no_interior'] ?? '') }}">
            </div>
            <div>
                <label for="colonia">Colonia:</label>
                <input type="text" id="colonia" name="direccion[colonia]" value="{{ old('direccion.colonia', $datos['direccion']['colonia'] ?? '') }}" required>
            </div>
            <div>
                <label for="localidad">Localidad:</label>
                <input type="text" id="localidad" name="direccion[localidad]" value="{{ old('direccion.localidad', $datos['direccion']['localidad'] ?? '') }}" required>
            </div>
            <div>
                <label for="municipio">Municipio:</label>
                <input type="text" id="municipio" name="direccion[municipio]" value="{{ old('direccion.municipio', $datos['direccion']['municipio'] ?? '') }}" required>
            </div>
            <div>
                <label for="cp">Código Postal:</label>
                <input type="text" id="cp" name="direccion[cp]" value="{{ old('direccion.cp', $datos['direccion']['cp'] ?? '') }}" required>
            </div>
        </fieldset>

        <!-- Referencias de Domicilio -->
        <fieldset>
            <legend>Referencias de Domicilio</legend>
            <div>
                <label for="referencia_1">Referencia 1:</label>
                <input type="text" id="referencia_1" name="referencias_domicilio[]" value="{{ old('referencias_domicilio.0', $datos['referencias_domicilio'][0] ?? '') }}">
            </div>
            <div>
                <label for="referencia_2">Referencia 2:</label>
                <input type="text" id="referencia_2" name="referencias_domicilio[]" value="{{ old('referencias_domicilio.1', $datos['referencias_domicilio'][1] ?? '') }}">
            </div>
        </fieldset>

        <!-- Contactos de Emergencia -->
        <fieldset>
            <legend>Contactos de Emergencia</legend>
            <div>
                <label for="contacto_emergencia_1_nombre">Nombre (Contacto 1):</label>
                <input type="text" id="contacto_emergencia_1_nombre" name="contacto_emergencia_1[nombre]" value="{{ old('contacto_emergencia_1.nombre', $datos['contacto_emergencia_1']['nombre'] ?? '') }}" required>
            </div>
            <div>
                <label for="contacto_emergencia_1_telefono">Teléfono (Contacto 1):</label>
                <input type="tel" id="contacto_emergencia_1_telefono" name="contacto_emergencia_1[telefono]" value="{{ old('contacto_emergencia_1.telefono', $datos['contacto_emergencia_1']['telefono'] ?? '') }}" required>
            </div>
            <div>
                <label for="contacto_emergencia_1_relacion">Relación (Contacto 1):</label>
                <input type="text" id="contacto_emergencia_1_relacion" name="contacto_emergencia_1[relacion]" value="{{ old('contacto_emergencia_1.relacion', $datos['contacto_emergencia_1']['relacion'] ?? '') }}" required>
            </div>
            <div>
                <label for="contacto_emergencia_2_nombre">Nombre (Contacto 2):</label>
                <input type="text" id="contacto_emergencia_2_nombre" name="contacto_emergencia_2[nombre]" value="{{ old('contacto_emergencia_2.nombre', $datos['contacto_emergencia_2']['nombre'] ?? '') }}" required>
            </div>
            <div>
                <label for="contacto_emergencia_2_telefono">Teléfono (Contacto 2):</label>
                <input type="tel" id="contacto_emergencia_2_telefono" name="contacto_emergencia_2[telefono]" value="{{ old('contacto_emergencia_2.telefono', $datos['contacto_emergencia_2']['telefono'] ?? '') }}" required>
            </div>
            <div>
                <label for="contacto_emergencia_2_relacion">Relación (Contacto 2):</label>
                <input type="text" id="contacto_emergencia_2_relacion" name="contacto_emergencia_2[relacion]" value="{{ old('contacto_emergencia_2.relacion', $datos['contacto_emergencia_2']['relacion'] ?? '') }}" required>
            </div>
        </fieldset>

        <!-- Aspectos Socioeconómicos -->
        <fieldset>
            <legend>Aspectos Socioeconómicos</legend>
            <div>
                <label for="trabaja">¿Trabaja?</label>
                <select id="trabaja" name="aspectos_socioeconomicos[trabaja]" required>
                    <option value="Sí" {{ (old('aspectos_socioeconomicos.trabaja', $datos['aspectos_socioeconomicos']['trabaja'] ?? '')) == 'Sí' ? 'selected' : '' }}>Sí</option>
                    <option value="Sí" {{ (old('aspectos_socioeconomicos.trabaja', $datos['aspectos_socioeconomicos']['trabaja'] ?? '')) == 'Sí' ? 'selected' : '' }}>Sí</option>
                    <option value="No" {{ (old('aspectos_socioeconomicos.trabaja', $datos['aspectos_socioeconomicos']['trabaja'] ?? '')) == 'No' ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div>
                <label for="horas_trabajo">Horas de Trabajo:</label>
                <input type="number" id="horas_trabajo" name="aspectos_socioeconomicos[horas_trabajo]" value="{{ old('aspectos_socioeconomicos.horas_trabajo', $datos['aspectos_socioeconomicos']['horas_trabajo'] ?? '') }}">
            </div>
            <div>
                <label for="nombre_trabajo">Nombre del Trabajo:</label>
                <input type="text" id="nombre_trabajo" name="aspectos_socioeconomicos[nombre_trabajo]" value="{{ old('aspectos_socioeconomicos.nombre_trabajo', $datos['aspectos_socioeconomicos']['nombre_trabajo'] ?? '') }}">
            </div>
            <div>
                <label for="direccion_trabajo">Dirección del Trabajo:</label>
                <input type="text" id="direccion_trabajo" name="aspectos_socioeconomicos[direccion_trabajo]" value="{{ old('aspectos_socioeconomicos.direccion_trabajo', $datos['aspectos_socioeconomicos']['direccion_trabajo'] ?? '') }}">
            </div>
            <div>
                <label for="dias_trabajo">Días de Trabajo:</label>
                <input type="text" id="dias_trabajo" name="aspectos_socioeconomicos[dias_trabajo]" value="{{ old('aspectos_socioeconomicos.dias_trabajo', $datos['aspectos_socioeconomicos']['dias_trabajo'] ?? '') }}">
            </div>
            <div>
                <label for="horario_trabajo">Horario de Trabajo:</label>
                <input type="text" id="horario_trabajo" name="aspectos_socioeconomicos[horario_trabajo]" value="{{ old('aspectos_socioeconomicos.horario_trabajo', $datos['aspectos_socioeconomicos']['horario_trabajo'] ?? '') }}">
            </div>
            <div>
                <label for="ingreso_mensual">Ingreso Mensual:</label>
                <input type="number" id="ingreso_mensual" name="aspectos_socioeconomicos[ingreso_mensual]" value="{{ old('aspectos_socioeconomicos.ingreso_mensual', $datos['aspectos_socioeconomicos']['ingreso_mensual'] ?? '') }}">
            </div>
            <div>
                <label for="dependencia_economica">Dependencia Económica:</label>
                <input type="text" id="dependencia_economica" name="aspectos_socioeconomicos[dependencia_economica]" value="{{ old('aspectos_socioeconomicos.dependencia_economica', $datos['aspectos_socioeconomicos']['dependencia_economica'] ?? '') }}">
            </div>
            <div>
                <label for="vive_con">Vive Con:</label>
                <input type="text" id="vive_con" name="aspectos_socioeconomicos[vive_con]" value="{{ old('aspectos_socioeconomicos.vive_con', $datos['aspectos_socioeconomicos']['vive_con'] ?? '') }}">
            </div>
        </fieldset>

        <!-- Aportantes al Gasto Familiar -->
        <fieldset>
            <legend>Aportantes al Gasto Familiar</legend>
            <div>
                <label for="padre">Padre:</label>
                <input type="checkbox" id="padre" name="aportantes_gasto_familiar[padre]" value="1" {{ (old('aportantes_gasto_familiar.padre', $datos['aportantes_gasto_familiar']['padre'] ?? '')) == 1 ? 'checked' : '' }}>
            </div>
            <div>
                <label for="madre">Madre:</label>
                <input type="checkbox" id="madre" name="aportantes_gasto_familiar[madre]" value="1" {{ (old('aportantes_gasto_familiar.madre', $datos['aportantes_gasto_familiar']['madre'] ?? '')) == 1 ? 'checked' : '' }}>
            </div>
            <div>
                <label for="hermanos">Hermanos:</label>
                <input type="checkbox" id="hermanos" name="aportantes_gasto_familiar[hermanos]" value="1" {{ (old('aportantes_gasto_familiar.hermanos', $datos['aportantes_gasto_familiar']['hermanos'] ?? '')) == 1 ? 'checked' : '' }}>
            </div>
            <div>
                <label for="abuelos_maternos">Abuelos Maternos:</label>
                <input type="checkbox" id="abuelos_maternos" name="aportantes_gasto_familiar[abuelos_maternos]" value="1" {{ (old('aportantes_gasto_familiar.abuelos_maternos', $datos['aportantes_gasto_familiar']['abuelos_maternos'] ?? '')) == 1 ? 'checked' : '' }}>
            </div>
            <div>
                <label for="abuelos_paternos">Abuelos Paternos:</label>
                <input type="checkbox" id="abuelos_paternos" name="aportantes_gasto_familiar[abuelos_paternos]" value="1" {{ (old('aportantes_gasto_familiar.abuelos_paternos', $datos['aportantes_gasto_familiar']['abuelos_paternos'] ?? '')) == 1 ? 'checked' : '' }}>
            </div>
            <div>
                <label for="parientes">Parientes:</label>
                <input type="checkbox" id="parientes" name="aportantes_gasto_familiar[parientes]" value="1" {{ (old('aportantes_gasto_familiar.parientes', $datos['aportantes_gasto_familiar']['parientes'] ?? '')) == 1 ? 'checked' : '' }}>
            </div>
            <div>
                <label for="ingreso_familiar">Ingreso Familiar:</label>
                <input type="number" id="ingreso_familiar" name="aportantes_gasto_familiar[ingreso_familiar]" value="{{ old('aportantes_gasto_familiar.ingreso_familiar', $datos['aportantes_gasto_familiar']['ingreso_familiar'] ?? '') }}">
            </div>
        </fieldset>

        <!-- Edad de los Integrantes de la Familia -->
        <fieldset>
            <legend>Edad de los Integrantes de la Familia</legend>
            <div>
                <label for="edad_integrante_1">Edad Integrante 1:</label>
                <input type="number" id="edad_integrante_1" name="edad_integrantes_familia[]" value="{{ old('edad_integrantes_familia.0', $datos['edad_integrantes_familia'][0] ?? '') }}">
            </div>
            <div>
                <label for="edad_integrante_2">Edad Integrante 2:</label>
                <input type="number" id="edad_integrante_2" name="edad_integrantes_familia[]" value="{{ old('edad_integrantes_familia.1', $datos['edad_integrantes_familia'][1] ?? '') }}">
            </div>
            <div>
                <label for="edad_integrante_3">Edad Integrante 3:</label>
                <input type="number" id="edad_integrante_3" name="edad_integrantes_familia[]" value="{{ old('edad_integrantes_familia.2', $datos['edad_integrantes_familia'][2] ?? '') }}">
            </div>
        </fieldset>

        <!-- Condiciones de Salud -->
        <fieldset>
            <legend>Condiciones de Salud</legend>
            <div>
                <label for="condiciones">Condiciones:</label>
                <input type="text" id="condiciones" name="condiciones_salud[condiciones]" value="{{ old('condiciones_salud.condiciones', $datos['condiciones_salud']['condiciones'] ?? '') }}">
            </div>
            <div>
                <label for="otro">Otro:</label>
                <input type="text" id="otro" name="condiciones_salud[otro]" value="{{ old('condiciones_salud.otro', $datos['condiciones_salud']['otro'] ?? '') }}">
            </div>
            <div>
                <label for="padecimiento_cronico">Padecimiento Crónico:</label>
                <select id="padecimiento_cronico" name="condiciones_salud[padecimiento_cronico]" required>
                    <option value="1" {{ (old('condiciones_salud.padecimiento_cronico', $datos['condiciones_salud']['padecimiento_cronico'] ?? '')) == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ (old('condiciones_salud.padecimiento_cronico', $datos['condiciones_salud']['padecimiento_cronico'] ?? '')) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div>
                <label for="nombre_padecimiento">Nombre del Padecimiento:</label>
                <input type="text" id="nombre_padecimiento" name="condiciones_salud[nombre_padecimiento]" value="{{ old('condiciones_salud.nombre_padecimiento', $datos['condiciones_salud']['nombre_padecimiento'] ?? '') }}">
            </div>
            <div>
                <label for="alergias">Alergias:</label>
                <select id="alergias" name="condiciones_salud[alergias]" required>
                    <option value="1" {{ (old('condiciones_salud.alergias', $datos['condiciones_salud']['alergias'] ?? '')) == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ (old('condiciones_salud.alergias', $datos['condiciones_salud']['alergias'] ?? '')) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div>
                <label for="nombre_alergia">Nombre de la Alergia:</label>
                <input type="text" id="nombre_alergia" name="condiciones_salud[nombre_alergia]" value="{{ old('condiciones_salud.nombre_alergia', $datos['condiciones_salud']['nombre_alergia'] ?? '') }}">
            </div>
            <div>
                <label for="toma_medicamentos">¿Toma Medicamentos?</label>
                <select id="toma_medicamentos" name="condiciones_salud[toma_medicamentos]" required>
                    <option value="1" {{ (old('condiciones_salud.toma_medicamentos', $datos['condiciones_salud']['toma_medicamentos'] ?? '')) == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ (old('condiciones_salud.toma_medicamentos', $datos['condiciones_salud']['toma_medicamentos'] ?? '')) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div>
                <label for="nombre_medicamento">Nombre del Medicamento:</label>
                <input type="text" id="nombre_medicamento" name="condiciones_salud[nombre_medicamento]" value="{{ old('condiciones_salud.nombre_medicamento', $datos['condiciones_salud']['nombre_medicamento'] ?? '') }}">
            </div>
            <div>
                <label for="atencion_psicologica">¿Atención Psicológica?</label>
                <select id="atencion_psicologica" name="condiciones_salud[atencion_psicologica]" required>
                    <option value="1" {{ (old('condiciones_salud.atencion_psicologica', $datos['condiciones_salud']['atencion_psicologica'] ?? '')) == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ (old('condiciones_salud.atencion_psicologica', $datos['condiciones_salud']['atencion_psicologica'] ?? '')) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div>
                <label for="motivo_atencion">Motivo de Atención:</label>
                <input type="text" id="motivo_atencion" name="condiciones_salud[motivo_atencion]" value="{{ old('condiciones_salud.motivo_atencion', $datos['condiciones_salud']['motivo_atencion'] ?? '') }}">
            </div>
        </fieldset>

        <!-- Análisis Académico -->
        <fieldset>
            <legend>Análisis Académico</legend>
            <div>
                <label for="tipo_escuela_previa">Tipo de Escuela Previa:</label>
                <select id="tipo_escuela_previa" name="analisis_academico[tipo_escuela_previa]" required>
                    <option value="Pública" {{ (old('analisis_academico.tipo_escuela_previa', $datos['analisis_academico']['tipo_escuela_previa'] ?? '')) == 'Pública' ? 'selected' : '' }}>Pública</option>
                    <option value="Privada" {{ (old('analisis_academico.tipo_escuela_previa', $datos['analisis_academico']['tipo_escuela_previa'] ?? '')) == 'Privada' ? 'selected' : '' }}>Privada</option>
                </select>
            </div>
            <div>
                <label for="modalidad_previa">Modalidad Previa:</label>
                <select id="modalidad_previa" name="analisis_academico[modalidad_previa]" required>
                    <option value="Presencial" {{ (old('analisis_academico.modalidad_previa', $datos['analisis_academico']['modalidad_previa'] ?? '')) == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                    <option value="En línea" {{ (old('analisis_academico.modalidad_previa', $datos['analisis_academico']['modalidad_previa'] ?? '')) == 'En línea' ? 'selected' : '' }}>En línea</option>
                </select>
            </div>
            <div>
                <label for="institucion_previa">Institución Previa:</label>
                <input type="text" id="institucion_previa" name="analisis_academico[institucion_previa]" value="{{ old('analisis_academico.institucion_previa', $datos['analisis_academico']['institucion_previa'] ?? '') }}" required>
            </div>
            <div>
                <label for="especialidad_previa">Especialidad Previa:</label>
                <input type="text" id="especialidad_previa" name="analisis_academico[especialidad_previa]" value="{{ old('analisis_academico.especialidad_previa', $datos['analisis_academico']['especialidad_previa'] ?? '') }}" required>
            </div>
            <div>
                <label for="municipio_institucion">Municipio de la Institución:</label>
                <input type="text" id="municipio_institucion" name="analisis_academico[municipio_institucion]" value="{{ old('analisis_academico.municipio_institucion', $datos['analisis_academico']['municipio_institucion'] ?? '') }}" required>
            </div>
            <div>
                <label for="estado_institucion">Estado de la Institución:</label>
                <input type="text" id="estado_institucion" name="analisis_academico[estado_institucion]" value="{{ old('analisis_academico.estado_institucion', $datos['analisis_academico']['estado_institucion'] ?? '') }}" required>
            </div>
        </fieldset>

        <!-- Expectativas Educativas y Ocupacionales -->
        <fieldset>
            <legend>Expectativas Educativas y Ocupacionales</legend>
            <div>
                <label for="espacio_laboral_preferido">Espacio Laboral Preferido:</label>
                <input type="text" id="espacio_laboral_preferido" name="expectativas_educativas_ocupacionales[espacio_laboral_preferido]" value="{{ old('expectativas_educativas_ocupacionales.espacio_laboral_preferido', $datos['expectativas_educativas_ocupacionales']['espacio_laboral_preferido'] ?? '') }}" required>
            </div>
            <div>
                <label for="posibilidades_trabajo">Posibilidades de Trabajo:</label>
                <select id="posibilidades_trabajo" name="expectativas_educativas_ocupacionales[posibilidades_trabajo]" required>
                    <option value="Alto" {{ (old('expectativas_educativas_ocupacionales.posibilidades_trabajo', $datos['expectativas_educativas_ocupacionales']['posibilidades_trabajo'] ?? '')) == 'Alto' ? 'selected' : '' }}>Alto</option>
                    <option value="Medio" {{ (old('expectativas_educativas_ocupacionales.posibilidades_trabajo', $datos['expectativas_educativas_ocupacionales']['posibilidades_trabajo'] ?? '')) == 'Medio' ? 'selected' : '' }}>Medio</option>
                    <option value="Bajo" {{ (old('expectativas_educativas_ocupacionales.posibilidades_trabajo', $datos['expectativas_educativas_ocupacionales']['posibilidades_trabajo'] ?? '')) == 'Bajo' ? 'selected' : '' }}>Bajo</option>
                </select>
            </div>
        </fieldset>

        <!-- Botón de Envío -->
        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>
@endsection