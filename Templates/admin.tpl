{include file = 'header.tpl'}
<h3>CREACION DE USUARIOS</h3>
<div><br>
        <div>Crear medico
            <form action="crear_medico" required method="POST">
                <input type="text" name="usuario" required placeholder="Usuario">
                <input type="password" name="password" required placeholder="Password">
                <input type="text" name="nombre" required placeholder="nombre">
                <input type="text" name="apellido" required placeholder="apellido">
                <input type="numb" name="id_especialidad" required placeholder="id_especialidad">
                <input type="submit" value="Ingresar">
            </form>
        </div><br><br><br>
        <div>Crear secretaria
            <form action="crear_secretaria" required method="POST">
                <input type="text" name="usuario" required placeholder="Usuario">
                <input type="password" name="password" required placeholder="Password">
                <input type="text" name="nombre" required placeholder="nombre">
                <input type="submit" value="Ingresar">
            </form>
        </div>
<br><br><br><br><br>
    <div>Relacionar usuarios<br><br>
            <form action="relacionar" required method="POST">
                <input type="text" name="medico" required placeholder="usuario del Medico">
                <input type="text" name="secretaria" required placeholder="usuario de la secretaria">
                <input type="submit" value="Ingresar">
            </form>
    </div>

            
    <h4>{$error}</h4>

</div>
{include file = 'footer.tpl'}