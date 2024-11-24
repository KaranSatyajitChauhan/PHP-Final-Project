<?php
class Registration{

    public $userName;
    public $firstName;
    public $lastName;
    public $passWord;
    public $confirmPassWord;

    function Registration($userName,$firstName, $lastName,$passWord,$confirmPassWord){
    $this-> userName = $userName;
    $this-> firstName=$firstName;
    $this-> lastName = $lastName;
    $this-> passWord = $passWord;
    $this-> confirmPassWord = $confirmPassWord;
    }
    //username
    function set_userName($userName) {
        $this->userName = $userName;
      }

      function get_userName() {
        return $this->userName;
      }


          //Firstname
      function set_firstName($firstName) {
        $this->firstName = $firstName;
      }
      function get_firstName() {
        return $this->firstName;
      }
      
      function set_lastName($lastName) {
        $this->lastName = $lastName;
      }
      function get_lastName() {
        return $this->lastName;
      }

      function set_passWord($passWord) {
        $this->passWord = $passWord;
      }
      function get_passWord() {
        return $this->passWord;
      }

      function set_confirmPassWord($confirmPassWord) {
        $this->confirmPassWord = $confirmPassWord;
      }
      function get_confirmPassWord() {
        return $this->confirmPassWord;
      }


    function userNameValidations($userName){
        //does userName exist?
         
    }
}
?>