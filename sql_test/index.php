<?php


class showJoinResult {
private $db;

function __construct($db){
     $this->db=$db;
    if ($this->db -> connect_errno) {
        echo "Failed to connect to MySQL: " . $this->db -> connect_error;
        exit();
      }
}
public function joinQuery()
{
    $result = $this->db -> query(" SELECT u.*, GROUP_CONCAT(res.test_id SEPARATOR ' , ') as test_ids, CAST(AVG(res.correct) AS DECIMAL(10,2))
    AS average_correct_answers, MAX(res.time_taken) as most_recently_taken_test
    FROM user as u
    LEFT JOIN test_result as res ON u.user_id = res.user_id
    GROUP by res.user_id
    ORDER BY res.time_taken DESC ");
    return $result;
    }
    
    public function displayTable($result)
    {
    if($result){
     $out='<table border=2> ';
     $out .= '<thead>
        <tr>
        <th>User id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Test Ids</th>
        <th>Average Correct Answers</th>
        <th>Most Recently Taken Test</th>
        </tr>
        </thead>';
        $out .=' <tbody style="text-align: center;">';    
    foreach($result as $key => $item ){
        $out .= '<tr>';
        $out .= '<td>' . $item['user_id'] . '</td>';
        $out .= '<td>' . $item['first_name'] . '</td>';
        $out .= '<td>' . $item['last_name'] . '</td>';
        $out .= '<td>' . $item['test_ids'] . '</td>';
        $out .= '<td>' . $item['average_correct_answers'] . '</td>';
        $out .= '<td>' . $item['most_recently_taken_test'] . '</td>';
        $out .= '</tr>';  

    }
        $out .='</tbody>';
        $out .='</table>';
    }else{
        $out="Error: no result found";
    }
    return $out;
}

}





$db = new mysqli('localhost','root','','tables');
$test = new showJoinResult($db);
$show=$test->displayTable($test->joinQuery());
echo $show;





?>