
<h1>El id es <?php echo $_ViewData["id"]; ?></h1>
<ul>
    <?php 
        foreach($_ViewData["datos"] as $obj){
            foreach($obj as $k => $v){
                print "<li>{$k} => {$v}</li>";
            }
        }
    ?>
</ul>

