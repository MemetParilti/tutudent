<?php
include 'func.php';


$op = "";
$c = getDB();

if(isset($_POST['op']))
$op = $_POST['op'];


if($op=="login_student")
{
    $em = p('email');
    $ps = p('pass');

    $r = qW1R("select count(*) as 'cn' from student where (email = :em and password = :ps)", ['em' => $em, 'ps' => $ps], $c);
    if($r['cn']==1)
    {
        $rr = qW1R("select * from student where (email = :em and password = :ps)", ['em' => $em, 'ps' => $ps], $c);    
        toJSON(['r' => 1, 'data' => $rr]);

    }else
    {
        toJSON(['r' => 0, 'data' => []]);
    }
}
else if($op=="login_teacher")
{
    
    $em = p('email');
    $ps = p('pass');

    $r = qW1R("select count(*) as 'cn' from teacher where (email = :em and password = :ps)", ['em' => $em, 'ps' => $ps], $c);
    if($r['cn']==1)
    {
        $rr = qW1R("select * from teacher where (email = :em and password = :ps)", ['em' => $em, 'ps' => $ps], $c);    
        $_SESSION['username'] = "amin"; 
        
        toJSON(['r' => 1, 'data' => $rr]);
       

    }else
    {
        toJSON(['r' => 0, 'data' => []]);
    }

}

else if($op=="add_note")
{
    $txt = p('txt');
    $teacherId = p('teacher_id');

    $r = qWNR("insert into note (text , date , teacher_id) values (:txt, now() , :teacher_id )", ['txt'=> $txt , "teacher_id" => $teacherId ], $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }

}

else if($op=="show_notes")
{
    $r = qWMR("select * from note ", null, $c);
    toJSON($r);

}



?>