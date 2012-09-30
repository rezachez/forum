<?php
    class View {
        public
            $vars = array();
        function render(){
            switch ($this->vars['page']){
                case 'messages':
                    $getter = new Getter();
                    $user = $getter->getCurrentUser();
                    $messages = $getter->getMessages();
                    include('./templates/header.php');
                    include('./templates/messages.php');
                    include('./templates/footer.php');
                    break;
                case 'message':
                    $getter = new Getter();
                    $user = $getter->getCurrentUser();
                    $message = $getter->getMessageById(array('messageId' => $this->vars['messageId']));
                    include('./templates/header.php');
                    include('./templates/message.php');
                    include('./templates/footer.php');
                    break;
                case 'profile':
                    $getter = new Getter();
                    $user = $getter->getCurrentUser();
                    include('./templates/header.php');
                    include('./templates/profile.php');
                    include('./templates/footer.php');
                    break;
                case 'foreignProfile':
                    $getter = new Getter();
                    $user = $getter->getCurrentUser();
                    $foreignProfile = $getter->getUserById(array('userId' => $this->vars['userId']));
                    include('./templates/header.php');
                    include('./templates/foreignProfile.php');
                    include('./templates/footer.php');
                    break;
                case 'vision':
                    include('./templates/vision.php');
                    break;
            }
        }
    }
?>