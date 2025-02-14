<?php

require("../../../php/data.php");
session_start();

if ($db->connect_error) {


    echo " Lost";
} else {

    if (empty($_SESSION['User'])) {
        echo 'guest';
    } else {



        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // $input = $_POST['input'];
            $room_name = $_POST['room'];
            $user = $_SESSION['User'];
            $get_user_id_q = "SELECT * FROM `self_notes` where email = '$user'";
            $res = $db->query($get_user_id_q);
            $row = $res->fetch_assoc();
            $user_id = $row["id"];
            // echo $user_id;
            // for get msg deteail 
            $get_msg_q = "SELECT  `sender`, `msg_text`, `time` FROM `msgs` WHERE room_name = '$room_name'";
            $ress = $db->query($get_msg_q);


            if ($ress->num_rows > 0) {




                for ($s = 0; $s <= $ress->num_rows - 1; $s++) {
                    $rowss = $ress->fetch_assoc();
                    $idd = $rowss['sender'];



                    if ($idd == $user_id) {
                        $str = $rowss['msg_text'];
                        $eco = base64_decode($str);


                        echo '<div class="container">
                         <p>' . $eco . '</p>
                         <span class="time-right">' . $rowss['time'] . '</span>
                     </div>';





                    } elseif ($idd == 'alert') {
                        $str = $rowss['msg_text'];
                        $eco = base64_decode($str);
                        echo '<div class="container alert">
                   
                                   <p>' . $eco . '</p><span class="time">' . $rowss['time'] . '</span>
                   
                              </div>';



                    } else {

                        $q = "SELECT * FROM `self_notes` where id = '$idd'";
                        $resf = $db->query($q);
                        if ($resf->num_rows > 0) {
                            $f = $resf->fetch_assoc();
                            $str = $rowss['msg_text'];
                            $eco = base64_decode($str);

                            echo '<div class="container darker">
                                      <p>' . $eco . '</p>
                                       <span class="time-left">' . $rowss['time'] . '</span> <span class="time-left">By ~ ' . $f['Full_name'] . '</span>
                                 </div>';


                        } else {
                            $str = $rowss['msg_text'];
                            $eco = base64_decode($str);

                            echo '<div class="container darker">
                                          <p>' . $eco . '</p>
                                           <span class="time-left">' . $rowss['time'] . '</span> <span class="time-left"> By ~ Deleted User</span>
                                     </div>';

                        }







                    }








                }









            }


        }

    }




}



?>