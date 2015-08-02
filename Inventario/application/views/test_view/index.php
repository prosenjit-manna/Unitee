<?php

if(isset($_REQUEST['txt_data']))
    echo "ESTE ES UN MENSAJE SI EXISTE EL TEXTO " , $_REQUEST['txt_data']

?>

<form method="get"  action="">
    
    <input type="text" name="txt_data" value="Nothing do here !!!" />
    <button type="submit" name="submit" >submit</button>
</form>