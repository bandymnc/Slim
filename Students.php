<?php

require __DIR__ . '/../classes/Mapper.php';
require __DIR__ . '/../classes/StudentEntity.php';

class Students extends Mapper
{
public function getStudents()
{
    $sql = "SELECT id, vezeteknev, keresztnev, email,kor,irszamid
    from tanulok";

    $stmt = $this->db->query($sql);

$results = [];
while($row = $stmt->fetch()) {
    $results[] = new StudentEntity($row);
}
return $results; 
}
}
?>