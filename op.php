<?php




include 'func.php';
header("Access-Control-Allow-Origin: *");
$c = getDB();

$op = p("op");

//#############################################
//admin methods :

if ($op == 'admin_log_in') {
    $em = p('email');
    $ps = p('pass');


    $r = qW1R("select count(*) as 'cn' from admins where (email = :em and pass = :ps)", ['em' => $em, 'ps' => $ps], $c);
    //$r = qWMR("select * from admins" , null , $c);
    if ($r['cn'] == 1) {
        $rr = qW1R("select * from admins where (email = :em and pass = :ps)", ['em' => $em, 'ps' => $ps], $c);
        toJSON(['r' => 1, 'adminData' => $rr]);
    } else if ($r['cn'] > 1) {
        toJSON(['r' => 0]);

    } else {
        toJSON(['r' => 0]);
    }

}
if ($op == 'get_admin') {
    $id = p('id');
    $r = qWMR("select * from admins where (id = :id)", ['id' => $id], $c);

    toJSON(['data' => $r]);

}
if ($op == 'add_admin') {
    $fn = p('fn');
    $ln = p('ln');
    $email = p('em');
    $ps = p('ps');
    $img = p('img');

    $params = [
        'fn' => p('fn'),
        'ln' => p('ln'),
        'email' => p('em'),
        'ps' => p('ps'),
        'top_access' => p('top'),
        'img' => p('img')

    ];
    //add image to folder and get url
 $check = qW1R("select count(*) as 'cn' from admins where email = :em",["em"=>$email],$c);
 if($check["cn"]==0)
 {
     $r = qWNR("insert into admins values (0, :fn, :ln, :email, :ps, :img , now() , :top_access)", $params, $c);
     if ($r == 1) {
         toJSON(['r' => 1]);
     } else {
         toJSON(['r' => 0]);

     }

 }else
 {
     toJSON(['r' => 2]);
 }




}
if ($op == 'update_admin') {
    $img = p('img');

    $params = [
        'id' => p('id'),
        'fn' => p('fn'),
        'ln' => p('ln'),
        'email' => p('em'),
        'ps' => p('ps'),
        'topAdmin' => p('top'),
        'img' => p('img')

    ];
$check = qW1R("select count(*) as 'cn' from admins where email = :em and id != :id",["em"=>$params['email'] , "id"=>$params['id']],$c);
if($check["cn"]==0)
{
    $q = "update admins set fn = :fn , ln = :ln , pass = :ps , email= :email , top_access = :topAdmin, img_url = :img where id = :id";


    $r = qWNR($q, $params, $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }

}else
{
    toJSON(['r' => 2]);

}




}

if ($op == 'update_admin_profile') {
    $img = p('img');

    $params = [
        'id' => p('id'),
        'fn' => p('fn'),
        'ln' => p('ln'),
        'email' => p('em'),
        'ps' => p('ps'),

        'img' => p('img')

    ];
$check = qW1R("select count(*) as 'cn' from admins where email = :em and id != :id",["em"=>$params['email'] , "id"=>$params['id']],$c);
if($check["cn"]==0)
{
    $q = "update admins set fn = :fn , ln = :ln , pass = :ps , email= :email , img_url = :img where id = :id";


    $r = qWNR($q, $params, $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }

}else
{
    toJSON(['r' => 2]);

}




}
if ($op == 'set_admin_token') {
    $id = p('id');
    $token = p('token');
    $r = qWNR("update admins set token = :tk where id = :id", ['tk' => $token, 'id' => $id]);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }


}
if ($op == 'delete_admin') {
    $id = p('id');
    $r = qWNR("delete from admins where (id = :id)", ['id' => $id], $c);

    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }
}
if ($op == 'get_admins') {
    $r = qWMR("select * from admins ", null, $c);
    toJSON($r);

}

//#############################################

if ($op == "get_num_players") {
    $r = qWMR("select count(*) as total  from players ", null, $c);
    toJSON($r);
}
if ($op == "get_num_games") {
    $r = qWMR("select count(*) as total  from games ", null, $c);
    toJSON($r);
}
if ($op == "get_num_resources") {
    $r = qWMR("select count(*) as total  from resources ", null, $c);
    toJSON($r);
}

//#############################################
//players methods :

if ($op == "get_all_players") {
    $r = qWMR("select * from players ", null, $c);
    toJSON($r);
}
if ($op == 'delete_player') {
    $id = p('id');
    $r = qWNR("delete from players where (id = :id)", ['id' => $id], $c);

    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }
}
if ($op == 'add_player') {
    $params = [
        'fn' => p('fn'),
        'ln' => p('ln'),
        'email' => p('em'),
        'ps' => p('ps'),
        'img' => p('img'),
        'dob' => p('dob')
    ];
    if(isset($_POST['dob']))
        $params['dob'] = p('dob');
    else
        $params['dob'] = '2000-01-01';
//check if other players has this email already ?


   $r = qW1R("select count(*) as total from players where email = :em", ['em' => $params['email']], $c);

    if($r['total']!=0)
    {
        toJSON(['r' => 2]);//used email

    }else if($r['total']==0)
    {
        $q = "insert into players values (0, :fn, :ln, :img , :email, :ps, :dob , now() , '' , 0 , 0 , 0, '')";


        $r = qWNR($q, $params, $c);
        if ($r == 1) {
            $rr = qW1R("select * from players where (email = :em and pass = :ps)", ['em' => $params['email'], 'ps' => $params['ps']], $c);
            toJSON(['r' => 1, 'playerData' => $rr]);
        } else {
            toJSON(['r' => 0]);

        }

    }
  


}
if ($op == 'update_player') {
    $params = [
        'id' => p('id'),
        'fn' => p('fn'),
        'ln' => p('ln'),
        'email' => p('em'),
        'dob' => p('dob'),
        'img'=>p('img')
    ];
    $q = "update players set fn = :fn , ln = :ln  , dob = :dob , email= :email , img_url  = :img where id = :id";


    $r = qWNR($q, $params, $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);
    }


}
if ($op == 'get_player') {
    $id = p('id');
    $r = qWMR("select * from players where id = $id ", null, $c);
    toJSON($r);

}
if ($op == 'block_player') {
    $id = p('id');
    $blockBool = p('blockBool');
    $r = qWNR("update players set blocked = $blockBool where id = $id", null, $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }
}

if ($op == 'set_player_token') {
    $id = p('id');
    $token = p('token');
    $r = qWNR("update players set token = :tk where id = :id", ['tk' => $token, 'id' => $id], $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }

}
if ($op == 'player_availability') {
    $id = p('id');
    $available = p('online');
    //it can be true or false
    $b = boolval($available);
    $r = qWNR("update players set online = :online where id = :id", ['online' => $b, 'id' => $id], $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }


}
if ($op == "player_login") {
    $em = p('email');
    $ps = p('pass');


    $r = qW1R("select count(*) as 'cn' from players where (email = :em and pass = :ps and blocked = 0)", ['em' => $em, 'ps' => $ps], $c);
    if ($r['cn'] == 1) {
        $rr = qW1R("select * from players where (email = :em and pass = :ps)", ['em' => $em, 'ps' => $ps], $c);
        toJSON(['r' => 1, 'playerData' => $rr]);
    } else if ($r['cn'] > 1) {
        toJSON(['r' => 0]);

    } else {
        toJSON(['r' => 0]);
    }

}

//#############################################
//resources methods :
if ($op == 'upload_img') {
    $fPath = saveFile($_FILES['img'], "uploads/");
    $params['img'] = $fPath;
    echo $fPath;

}
if ($op == 'upload_img_mobile') {
    $fPath = saveFile($_FILES['img'], "uploads/");
    $params['img'] = $fPath;
    toJSON(['r'=>1 , 'path'=>$fPath]);

}

if ($op == 'get_resources') {
    // $r = qWMR("select p.img_url , p.fn , r.review_txt , r.date , r.id  from reviews r , players p where r.player_id = p.id" , null , $c);

    $r = qWMR("select c.cat_txt , c.id , r.*  from resources r , categories c where c.id = r.cat_id ", null, $c);
    toJSON($r);
}

if ($op == 'delete_resource') {
    $id = p('id');
    $r = qWNR("delete from resources where (id = :id)", ['id' => $id], $c);

    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }
}
if ($op == 'add_resource') {
    $params = [
        'wtxt' => p('txt'),
        'cat' => p('cat'),
        'img' => p('img')
    ];

    $check = qW1R("select count(*) as 'cn' from resources where (word_txt = :txt and  cat_id = :cat)", ['txt' => $params['wtxt'] , "cat"=>$params['cat']], $c);
    if($check["cn"] == 0)
    {
        $q = "insert into resources values (0, :wtxt , :img , :cat)";
        $r = qWNR($q, $params, $c);
        if ($r == 1) {
            toJSON(['r' => 1]);
        } else {
            toJSON(['r' => 0]);

        }

    }else
    {
        toJSON(['r' => 2]);
    }



}
if ($op == 'update_resource') {
    $params = [
        'wtxt' => p('txt'),
        'cat' => p('cat'),
        'id' => p('id'),
        'img' => p('img')
    ];
    $check = qW1R("select count(*) as 'cn' from resources where (id != :id and word_txt = :txt and  cat_id = :cat )", ['id' => $params['id'],'txt' => $params['wtxt'] , "cat"=>$params['cat']], $c);
if($check["cn"] == 0)
{
    $q = "update resources set word_txt = :wtxt , cat_id = :cat , word_image_url = :img where id = :id";


    $r = qWNR($q, $params, $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }

}else
{
    toJSON(['r' => 2]);

}





}

//#############################################
//cats methods :


if ($op == 'get_cats') {
    $r = qWMR("select * from categories", null, $c);
    toJSON($r);

}
if ($op == 'add_cat') {
    $catText = p('catTxt');
    $img = p('img');

    $r = qWNR("insert into categories values (0,:txt , :img)", ['txt' => $catText, 'img' => $img], $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }


}
if ($op == 'update_cat') {
    $catText = p('catTxt');
    $params = ['txt' => $catText, 'img' => p('img'), 'id' => p('id')];

    $q = "update categories set cat_txt = :txt , cat_image_url= :img where id = :id";

    $r = qWNR($q, $params, $c);

    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }


}
if ($op == 'delete_cat') {
    $id = p('id');
    $r = qWNR("delete from categories where id = $id", null, $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }


}

//#############################################
//reviewes methods :

if ($op == 'get_reviews') {
    $r = qWMR("select p.img_url , p.fn , r.review_txt , r.date , r.id  from reviews r , players p where r.player_id = p.id", null, $c);

    //  $r = qWMR("select * from reviews", null, $c);
    toJSON($r);

}
if ($op == 'add_review') {
    $id = p('id');
    $txt = p('txt');


    $r = qWNR("insert into reviews values (0,:txt , :pid , now())", ['txt' => $txt, 'pid' => $id], $c);
    if ($r == 1) {
        toJSON(['r' => 1]);
    } else {
        toJSON(['r' => 0]);

    }

}
if ($op == '1change_password_req') {
    $pid = p('id');
    $email = p('email');
    //generate code 5 digits :
    $code = Rand(10000, 90000);
    $r = qW1R("select email from players where id = :pid", ['pid' => $pid], $c);
    if($r['email'] != $email)
    {
        toJSON(['r' => 0]);

    }else
    {

    if ($r != null) {

        $rr = qWNR("update players set new_pass_code = :code where id = :pid", ['pid' => $pid, 'code' => $code], $c);
        if ($rr == 1) {

            $userEmail = $r['email'];
            $send = sendMail("$userEmail", 'change password request', "<h1>as requested to change password : </h1> <br/> , <h3>  please use the changing password confirmation code : $code </h3> </<br> Thank you");

            if ($send == 1) {
                toJSON(['r' => 1]);

            } else {
                toJSON(['r' => 0]);
            }


        } else {
            toJSON(['r' => 0]);
        }


    } else {
        toJSON(['r' => 0]);
    }
    }



}
if ($op == 'change_password_req') {

    $email = p('email');
    //generate code 5 digits :
    $code = Rand(10000, 90000);
    $id= 'none';

    $t = qW1R("select count(*) as total from players where email = :em", ['em' => $email], $c);
    if($t['total'] == 1)
    {
        $r = qW1R("select * from players where email = :em", ['em' => $email], $c);
        $id = $r['id'];


            $rr = qWNR("update players set new_pass_code = :code where id = :pid", ['pid' => $id, 'code' => $code], $c);
            if ($rr == 1) {

                $userEmail = $r['email'];
                $send = sendMail("$userEmail", 'change password request', "<h1>as requested to change password : </h1> <br/> , <h3>  please use the changing password confirmation code : $code </h3> </<br> Thank you");

                if ($send == 1) {
                    toJSON(['r' => 1 , 'id'=>$id]);

                } else {
                    toJSON(['r' => 0]);
                }


            } else {
                toJSON(['r' => 0]);
            }


        }


    else
    {
        toJSON(['r' => 0]);
    }








    /*
    if($r['email'] != $email)
    {
        toJSON(['r' => 0]);

    }else
    {

        if ($r != null) {

            $rr = qWNR("update players set new_pass_code = :code where id = :pid", ['pid' => $pid, 'code' => $code], $c);
            if ($rr == 1) {

                $userEmail = $r['email'];
                $send = sendMail("$userEmail", 'change password request', "<h1>as requested to change password : </h1> <br/> , <h3>  please use the changing password confirmation code : $code </h3> </<br> Thank you");

                if ($send == 1) {
                    toJSON(['r' => 1]);

                } else {
                    toJSON(['r' => 0]);
                }


            } else {
                toJSON(['r' => 0]);
            }


        } else {
            toJSON(['r' => 0]);
        }
    }
*/


}
if($op == 'check_password_req_code')
{
    $code = p('code');
    $pid = p('id');
    $r = qW1R("select new_pass_code from players where id = :pid", ['pid' => $pid], $c);

    if($r['new_pass_code']==$code)
    {
        $rr = qWNR("update players set new_pass_code= :del where id = :pid", ['pid' => $pid , 'del'=>'none'], $c);
        toJSON(['r' => 1]);


    }

    else
        toJSON(['r' => 0]);
}
if($op == 'update_pass')
{
    $pid = p('id');
    $newPass = p('pass');
    $r = qWNR("update players set pass= :ps where id = :pid", ['pid' => $pid , 'ps'=>$newPass], $c);
    if($r == 1)
    {
        toJSON(['r' => 1]);

    }else
    {
        toJSON(['r' => 0]);
    }

}

//practice algo :
if($op == "practice_now")
{

    $pid = p('id');
    $cat_id = p('cat_id');
    //get total how many times he practiced today
    $r = qWMR("select * from practice_history where player_id = :id and cat_id = :cat",['id'=>$pid , 'cat'=>$cat_id],$c);
    //print_r(toArr($r[0]['words_range']));
    if(sizeof($r)<10)
    {
        //collect all practiced questions in on array
        $total_practiced_questions = [];
        foreach($r as $i)
        {
            $x = toArr($i['words_range']);
            $total_practiced_questions = array_merge($x , $total_practiced_questions);
        }
        //get resources from same category but not inside the already practcied array
        $total_for_sql = implode("', '", $total_practiced_questions);
        $rr = qWMR("select * from resources where cat_id = :cat_id and id NOT IN ('$total_for_sql') ORDER BY RAND()   limit 10" , ['cat_id'=>$cat_id]  ,$c);
        //10 questions are uniquely gotten so send them back to player on mobile :
        if(sizeof($rr)==10)
        {
            toJSON(['r' => 1 , 'questions'=>$rr]);

        }else
        {
            toJSON(['r' => 0]);

        }

    }
    else
    {
        toJSON(['r' => 0]);

    }

}
if($op == "submit_practice_result") {
    //mobile send two lists :
    // one is the original list = id , word
    // second is the answered list = id , word , as player answered
   $pid = p('id');
   $cat = p('cat_id');

   $original_list = p('original_list');
   $oArr = toArr($original_list);

   $answers_list = p('answers_list');
   $aArr = toArr($answers_list);

   $resultsList = [];
   $points = 0;
   $response = [];

   //count results and make new result list to be saved

    for ($i=0;$i<10;$i++)
    {
        $AWord = $aArr[$i]['txt'];
        $OWord = $oArr[$i]['txt'];
        if( $AWord == $OWord)
        {
            $points++;

            $res = ['result'=>1 , 'originalWord'=>$OWord , 'playerWord'=>$AWord];
            array_push($resultsList , $res);
        }
        else
        {
            $res = ['result'=>0 , 'originalWord'=>$OWord , 'playerWord'=>$AWord];
            array_push($resultsList , $res);

        }

    }
    $response['final'] = ['score'=>$points];
    $response['data'] = $resultsList;

    //words range list
    $wordsRange = [];


    foreach ($oArr as $i)
        array_push($wordsRange , $i['id']);
    $wordsS = json_encode($wordsRange);
    $resultsListS = json_encode($resultsList);

    //save at the db practiced history
   $r = qWNR("insert into practice_history (player_id, cat_id, words_range , result_list , date) values (:pid,:cat,:w,:r,now())" , ['pid'=>$pid , 'cat'=>$cat ,  'w'=>$wordsS , 'r'=>$resultsListS] , $c);
    if($r == 1)
    {
      toJSON(['r'=>1 , 'result'=>$response]);

    }else
    {
       toJSON(['r' => 0]);
    }

/*
   $x = p('data');
   $z = json_decode($x);
   $a = toArr($x);
*/


}
if($op == 'submit_game_fromFB')
{


    $gameid = p('gameid');
    $date = p('date');
    $p1id = p('p1id');
    $list1 = p('p1list');
    $p1list = toArr($list1);
    $p2id = p('p2id');
    $list2 =p('p2list');
    $p2list = toArr($list2);
    $original_list = toArr((p('original')));


    /*
      $gameid = p('gameid');
      $date = p('date');
      $p1id = p('p1id');
      $p1list = toArr(json_decode(p('p1list')));
      $p2id = p('p2id');
      $p2list =toArr(json_decode(p('p2list')));
      $original_list = toArr(json_decode(p('original')));
*/

    $p1resultsList = [];
    $p2resultsList = [];
    $p1points = 0;
    $p2points = 0;
    $response = [];

    for ($i=0;$i<sizeof($p1list);$i++)
    {
        $p1Word = $p1list[$i]['txt'];
        $oWord = $original_list[$i]['txt'];
        if( $p1Word == $oWord)
        {
            $p1points++;

            $res = ['result'=>1 , 'originalWord'=>$oWord , 'playerWord'=>$p1Word];
            array_push($p1resultsList , $res);
        }
        else
        {
            $res = ['result'=>0 , 'originalWord'=>$oWord , 'playerWord'=>$p1Word];
            array_push($p1resultsList , $res);

        }

    }
    for ($i=0;$i<sizeof($p2list);$i++)
    {

        $p2Word = $p2list[$i]['txt'];
        $oWord = $original_list[$i]['txt'];
        if( $p2Word == $oWord)
        {
            $p2points++;

            $res = ['result'=>1 , 'originalWord'=>$oWord , 'playerWord'=>$p2Word];
            array_push($p2resultsList , $res);
        }
        else
        {
            $res = ['result'=>0 , 'originalWord'=>$oWord , 'playerWord'=>$p2Word];
            array_push($p2resultsList , $res);

        }

    }


    //who is winner and how much score winned
    $winnedScore = 5;
    $winnerid = 0;
    $max = 0;
    if($p1points > $p2points)
    {
        $winnerid = $p1id;
        $max = $p1points;

    }else if($p1points < $p2points)
    {
        $winnerid = $p2id;
        $max = $p2points;
    }else if($p1points == $p2points)
    {
        $winnedScore = 0;
        $winnerid = 2;
    }
    
    
    $response['final'] = ['p1Score'=>$p1points , 'p2Score'=>$p2points];
    $response['p1Data'] = $p1resultsList;
    $response['p2Data'] = $p2resultsList;
    $response['winner'] = ['id'=>$winnerid , 'winned_score'=>$winnedScore , 'winner_points'=>$max];


    $resultsListS = json_encode($response);

    //save at the db practiced history
    $r = qWNR("insert into games (id , p1id, p2id , winner_id , winnded_score ,date , result) values (:id,:p1id , :p2id , :winid , :winscore , now(), :r)" , ['id'=>$gameid , 'p1id'=>$p1id , 'p2id'=> $p2id,  'winid'=>$winnerid ,'winscore'=>$winnedScore, 'r'=>$resultsListS] , $c);


    if ($r == 1) {
        if($winnerid != 2)
        {
            $q = "update players set score = score + 5 where id = :id";
            $rr = qWNR($q, ['id'=>$winnerid], $c);
            if($rr == 1)
                toJSON(['r'=>1 , 'result'=>$response]);

            else
                toJSON(['r' => 0]);


        }else if($winnerid == 2)
            {
                toJSON(['r'=>1 , 'result'=>$response]);
            }

    } else {
        toJSON(['r' => 0]);
    }





}
if($op == 'return_game')
{
    //get game data result and decode it
    $gameid = p('gameid');
    $rr = qWMR("select * from games where id = :id" , ['id'=>$gameid]  ,$c);
    $x = $rr[0]['result'];
    $decoded = json_decode($x);
    $arr = toArr($x);


  toJSON(['r'=>1 , 'result'=>$decoded]);


}
if($op == 'return_allgames')
{
    //get game data result and decode it
    $id = p('id');
    $rr = qWMR("select * from games where p1id = :id or p2id = :id" , ['id'=>$id]  ,$c);
    $resp = [];
   for($i = 0;$i<sizeof($rr);$i++)
   {
      $x =toArr( $rr[$i]['result']);
       $rr[$i]['result'] = $x;
   }



    toJSON(['r'=>1 , 'result'=>$rr]);


}

if($op == "start_new_game_withFB")
{
    $rr = qWMR("select * from resources ORDER BY RAND()  limit 10" , null  ,$c);
    //10 questions are uniquely gotten so send them back to player on mobile :

    if(sizeof($rr)==10)
    {
        toJSON(['r' => 1 , 'questions'=>$rr]);

    }else
    {
        toJSON(['r' => 0]);

    }



}

if($op == "start_game") {
    $p1id = p('id');
    $game_state = 0;

    $r = qWNR("insert into games_sessions (p1id, game_state ,  date) values (:pid, :st ,now())" , ['pid'=>$p1id ,'st'=>$game_state] , $c);
    if($r == 1)
    {
        $rr = qWMR("select g.* ,p.img_url , p.token , p.fn , p.score  from games_sessions g , players p where g.p1id = :pid and g.p1id = p.id ORDER BY id DESC LIMIT 1;" , ['pid'=>$p1id] , $c);
        toJSON(['r'=>1 , 'data'=>$rr]);

    }else
    {
        toJSON(['r' => 0]);
    }

}

if($op == 'get_available_games')
{
    //$r = qWMR("select p.img_url , p.fn , r.review_txt , r.date , r.id  from reviews r , players p where r.player_id = p.id", null, $c);
    $r = qWMR("select p.img_url , p.fn , p.token , p.score ,g.* from games_sessions g , players p where p.id = g.p1id",null,$c);
    toJSON($r);

}
if($op == 'get_one_game')
{
    $gameId = p('game_id');

    $r = qWMR("select p.img_url , p.fn , p.token , p.score ,g.* from games_sessions g , players p where p.id = g.p1id and g.id = :gameid",['gameid'=>$gameId],$c);
    toJSON($r);

}
if($op == 'join_game')
{
    $p2id = p('id');
    $gameId = p('game_id');
    $game_state = 1;

    $r = qWNR("update games_sessions set p2id= :id , game_state = :st where id = :gid", ['gid' => $gameId , 'id'=>$p2id , 'st'=>$game_state], $c);
    if($r == 1)
    {
        toJSON(['r' => 1]);

    }else
    {
        toJSON(['r' => 0]);
    }

}
if($op == 'ready_game')
{
    $gameId = p('game_id');
    $token;
    $r = qW1R("select p1id from games_sessions where id = :gid",['gid'=>$gameId] , $c);
    $p1id = $r['p1id'];
    $rr = qW1R("select token from players where id = :p1id",['p1id'=>$p1id] , $c);
    $token = $rr['token'];

    $r = sendGCM("1",$token);
    $a = toArr($r);
    toJSON($a);

    if($a['success']==1)
    {
        toJSON(['r'=>1]);

    }else{
        toJSON(['r'=>0 , 'data' => $a]);

    }
    //print_r($a);



}
function sendGCM($message, $id) {


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array (
        'registration_ids' => array (
            $id
        ),
        'data' => array (
            'type'=>'ready',
            "res" => $message
        ),
        'notification' => array('title'=>'welcome' ,  'body'=>array (
            'type'=>'ready',
            "res" => $message
        ),)
    );
    $fields = json_encode ( $fields );

    $headers = array (
        'Authorization: key=' . "AAAA_-jJ3K0:APA91bGrtQM6Xt9oEBikFV-9nOQKNP5qT69ENcW8-j8WgU42GbZu7n4RaAfrp2NV0CUgBzwziypWP0hOWHm1YyGf4vwb7M80EWnDHBULLmK-lL63MSw7U_h93pjLm6cEjU-kaEsayqB7",
        'Content-Type: application/json'
    );

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    $result = curl_exec ( $ch );
   // echo $result;

    curl_close ( $ch );
    return $result;
}





?>
