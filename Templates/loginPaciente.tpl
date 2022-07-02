{include file = 'header.tpl'}
<div>       
        <div class="container-login">
          <h1 >{$titulo}</h1>
            <form class="contenido-form" action="verify-user" method="POST">
                <input type="number" name="dni" placeholder="DNI">
                <input class="btn" style="width:{'50%'}" type="submit" value="Ingresar">
            </form>
            <a href="loginPaciente">Ingresar como Empleado</a>
        </div>
            
    {if $error}
        <h4>{$error}</h4>
        <a href="registro-paciente">Crear una cuenta</a>
        
    {/if}

</div>
{include file = 'footer.tpl'}