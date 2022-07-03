{include file = 'header.tpl'}
<div>       
        <div class="container-login">
          <h1 >{$titulo}</h1>
            <form class="contenido-form" action="verify-user" method="POST">
                <input type="number" name="dni" placeholder="DNI" required>
                <input class="btn" style="width:{'50%'}" type="submit" value="Ingresar">
            </form>
            <a href="loginAdministrativo">Ingresar como administrador de institucion</a>
        </div>

        <a href="registro-paciente">Crear una cuenta</a>
    {if $error}
        <h4>{$error}</h4>

    {/if}

</div>
{include file = 'footer.tpl'}