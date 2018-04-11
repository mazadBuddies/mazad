<?php

class feedback{
        public function getAllMyFeedBacks($userId){
            $connectToDatabase = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
            $connectToDatabase->setTable('feedback');
            $myFeedbacks = $connectToDatabase->select('*', array('aboutId'), array($userId));
            $feedbackAsVeiw = array();
            $masterUser = new user();
            for($i=0; $i<sizeof($myFeedbacks);$i++){
                $aboutUserData = $masterUser->getUserDataById("firstName, imagePath", $myFeedbacks[$i]['fromId']);
                $rowArray = array(
                    "photo"=>$aboutUserData[0]['imagePath'],
                    "name"=>$aboutUserData[0]['firstName'],
                    "stars"=>$myFeedbacks[$i]['stars'],
                    "date"=>"11-11-2016",
                    "feedback"=>$myFeedbacks[$i]['feedback']
                );
                $feedbackAsVeiw[] = $rowArray;
            }
            return $feedbackAsVeiw;
        }
}//end of class feedback