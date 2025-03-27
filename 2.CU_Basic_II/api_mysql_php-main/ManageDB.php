<?php
include_once 'DB.php';

class ManageBD extends DB {
    public function getQueries() {
        // Usamos una única conexión
        $pdo = $this->connect();
        
        // Consulta para obtener la "matrícula" uniendo student y department
        $matricula = $pdo->query('
            SELECT 
                s.ID, 
                s.name, 
                s.tot_cred, 
                d.dept_name, 
                d.building, 
                d.budget  
            FROM student s
            INNER JOIN department d ON s.dept_name = d.dept_name
            WHERE d.dept_name = "Physics"
        ');

        // Consulta para obtener la información del departamento "Physics"
        $department = $pdo->query('
            SELECT * FROM department 
            WHERE dept_name = "Physics"
        ');

        return [
            "matricula"  => $matricula,
            "department" => $department
        ];
    }
}
?>
