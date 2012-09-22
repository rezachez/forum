<?php
    class View {
        public
            $vars = array();
        function render(){
            switch ($this->vars['page']){
                case 'start':
                    include('./templates/header.php');
                    include('./templates/footer.php');
                    break;
                case 'notes':
                    $getter = new Getter();
                    $user = $getter->getCurrentUser();
                    $notes = $getter->getNotes();
                    include('./templates/header.php');
                    include('./templates/notes.php');
                    include('./templates/footer.php');
                    break;
                case 'profile':
                    $getter = new Getter();
                    $user = $getter->getCurrentUser();
                    include('./templates/header.php');
                    include('./templates/profile.php');
                    include('./templates/footer.php');
                    break;
                case 'note':
                    $getter = new Getter();
                    $user = $getter->getCurrentUser();
                    $note = $getter->getNoteById(array('noteId' => $this->vars['noteId']));
                    $comments = $getter->getComments(array('noteId' => $this->vars['noteId']));
                    include('./templates/header.php');
                    include('./templates/note.php');
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
            }
        }
    }
?>