
<?php   
// i need to extend from arrayobject as i need to use object of type arrInheritance as array 
// with out the inheritence of the arrayObject i wont be able to set keys and values to an array;
class arrInheritance extends ArrayObject {

    
//   setting keys and values to an array from object 
    public function __set($index, $val) {
        $this[$index] = $val;
    }

    public function displayAsTable() {
        // TYPE CASTING from object to array
        $arr=(array) $this;
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