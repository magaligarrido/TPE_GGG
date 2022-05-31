    <div>
            <h3>Crear medico </h3>
            <form class="contenido-form"action="crear_medico" required method="POST">
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