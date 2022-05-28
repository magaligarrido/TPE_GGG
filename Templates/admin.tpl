{include file = 'header.tpl'}
<h3>CREACION DE USUARIOS</h3>
<div>
        <div>
            <h3>Crear medico </h3>
            <form action="crear_medico" required method="POST">
                <input type="text" name="usuario" required placeholder="Usuario">
                <input type="password" name="password" required placeholder="Password">
                <input type="text" name="nombre" required placeholder="nombre">
                <input type="text" name="apellido" required placeholder="apellido">
                <select name="id_especialidad" id="lista_especialidad" required>
                    <option disable >--Seleccione Especialidad---</option>
                    {foreach from=$especialidades item=especialidad}
                         <option value="{$especialidad->id_especialidad}">{$especialidad->especialidad}</option>
                    {/foreach}                   
                </select>
                <input type="submit" value="Ingresar">
            </form>
        </div>
        <div>
            <h3>Crear secretaria </h3>
            <form action="crear_secretaria" required method="POST">
                <input type="text" name="usuario" required placeholder="Usuario">
                <input type="password" name="password" required placeholder="Password">
                <input type="text" name="nombre" required placeholder="nombre">
                <input type="submit" value="Ingresar">
            </form>
        </div>

    <div>
        <h3>Relacionar usuarios</h3>
        <form action="relacionar" required method="POST">
            <select name="id_medico" id="lista_medico" required>
                <option disable >--Seleccione Medico---</option>
                {foreach from=$medicos item=medico}
                        <option value="{$medico->id_medico}">{$medico->apellido}, {$medico->nombre}</option>
                {/foreach}                   
            </select>

            <select name="id_secretaria" id="lista_secretaria" required>
                <option disable >--Seleccione Secretaria---</option>
                {foreach from=$secretarias item=secretaria}
                        <option value="{$secretaria->id_secretaria}">{$secretaria->nombre}</option>
                {/foreach}                   
            </select>

            <input type="submit" value="Ingresar">
        </form>
    </div>

    <div>
        <h3>Crear Especilidad </h3>
        <form action="crear_especialidad" required method="POST">
            <input type="text" name="id_especialidad" required placeholder="Especialidad">
            <input type="submit" value="Ingresar">
        </form>

    </div>

            
    <h4>{$error}</h4>

</div>
{include file = 'footer.tpl'}