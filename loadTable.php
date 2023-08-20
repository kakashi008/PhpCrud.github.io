<?php

$conn = mysqli_connect('localhost','root','','table');

$sql = "SELECT * FROM user";
$result = mysqli_query($conn,$sql);
$output = '';
if(mysqli_num_rows($result)>0){
    $output .= "<tr class='text-center'>
                    <th class='th-0'>ID</th>
                    <th class='th-0'>Name</th>
                    <th class='th-1'>Class Name</th>
                    <th class='th-2'>Age</th>
                    <td class='th-3'>EDIT</td>
                    <td class='th-4'>DELET</td>
                </tr>";
                while($row = mysqli_fetch_assoc($result)){
         $output .= "<tr class='text-center'>
                        <td>{$row['user_id']}</td>
                        <td>{$row['user_name']}</td>
                        <td>{$row['class']}</td>
                        <td>{$row['age']}</td>
                        <td><button id='edit'  class='edit' data-id='$row[user_id]'>Edit</button></td>
                        <td><button id='delet' class='delet' data-id='$row[user_id]'>Delet</button></td>
                    </tr>";
                }
  echo $output;
}else{
    echo 'something is wrong';
}




?>