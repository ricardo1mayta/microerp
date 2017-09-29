<?php
    //database configuration
    $dbHost = 'localhost';
    $dbUsername = 'grupodig_seguim';
    $dbPassword = 'digamma2016$$';
    $dbName = 'grupodig_sys';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
	$sql="SELECT EMP_C_CODIGO, EMP_C_RUC, EMP_D_RAZONSOCIAL,EMP_D_NOMBRECOMERCIAL FROM dg_empresas WHERE (EMP_D_RAZONSOCIAL LIKE '%$searchTerm%' OR EMP_D_NOMBRECOMERCIAL LIKE '%$searchTerm%') LIMIT 10 ORDER BY EMP_D_RAZONSOCIAL ASC;";
    $query = $db->query($sql);
    while ($row = $query->fetch_assoc()) {
        $data[] = $row["EMP_D_RAZONSOCIAL"];
    }
    
    //return json data
    echo json_encode($data);
?>