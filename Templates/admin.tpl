{include file = 'header.tpl'}
<h3>ADMINISTRACION CENTRO MEDICO</h3>
<a href="Logout">Logout</a>
    
<h4>{$error}</h4>
<div class="display-flex-row">
    <div>
        {include file = 'adminMedicos.tpl'}
        {include file = 'adminListaMedicos.tpl'}
    </div>

    <div>
        {include file = 'adminSecretarias.tpl'}
        {include file = 'adminListaSecretarias.tpl'}
    </div>

    <div>
        {include file = 'adminRelaciones.tpl'}
        {include file = 'adminListaRelaciones.tpl'}
    </div>

    <div>
        {include file = 'adminEspecialidades.tpl'}    
        {include file = 'adminListaEspecialidades.tpl'}    
    </div>          
    
</div>
{include file = 'footer.tpl'}