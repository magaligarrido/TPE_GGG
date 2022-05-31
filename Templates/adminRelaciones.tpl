
    <div>
        <h3>Relacionar usuarios</h3>
        <form class="contenido-form" action="relacionar" required method="POST">
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