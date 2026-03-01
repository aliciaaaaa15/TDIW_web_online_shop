<?php
    function loadCategorias($con){
        $query = "SELECT id, categoria,img FROM categoria";
        $result = pg_query($con, $query) or die("Error SQL query");
        $categories = pg_fetch_all($result);
        return $categories;
    }
?>