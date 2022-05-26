  <div>
        <h1 >{$titulo}</h1>
        <div>
            <form action="verify" method="POST">
                <input type="text" name="usuario" placeholder="Usuario">
                <input type="pass" name="pass" placeholder="Password">
                <input type="submit" value="Ingresar">
            </form>
        </div>
        <a href="">INGRESE COMO PACIENTE</a>
            
    <h4>{$error}</h4>
    <a  href="registro">CREAR CUENTA</a>

    </div>