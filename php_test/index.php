
<?php   

class arrInheritance extends ArrayObject {

    private $data = array();
//   setting keys and values to an array from object 
    public function __set($index, $val) {
        $this->data[$index] = $val;
    }

    public function displayAsTable() {
        
        $arr=$this->data;
        $out =  '<table border=2>';
        $out .= '<thead>
        <tr>
        <th>Keys</th>
        <th>Values</th>
        </tr>
        </thead>';
        $out .=' <tbody>';    
       
        // print_r($arr);
        foreach ( $arr as $key => $item) {
            $out .= '<tr>';
            $out .= '<td>' . $key . '</td>';
            $out .= '<th>' . $item . '</th>';
            $out .= '</tr>';
        }    
        $out .= '</tbody>';
        $out .=  '</table>';    
        return $out;
    } 
}

$info = new arrInheritance();    
$info->id = 1; 
$info->first_name = 'Motiur'; 
$info->last_name = 'Rahman'; 
$info->education = 'Bs in CSE';
$info->institution = 'NSU';

echo $info->displayAsTable();    

?>