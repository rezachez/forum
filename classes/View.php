<?php
    class View {
        const
            EmE = 'E-mail empty.',
            EmP = 'Password empty.',
            DbE = 'Database error.',
            ExU = 'User exists.',
            AuU = 'User no auth.';
        public
            $vars = array(),
            $getter;
        function __construct(){
            $this->getter = new Getter();
        }
        function render(){
            switch ($this->vars['page']){
                case 'start':
                    include('./templates/start.php');
                    break;
                case 'notes':
                    $this->vars['currentUser'] = $this->getter->getCurrentUser();
                    $this->vars['notes'] = $this->getter->getNotes();
                    include('./templates/notes.php');
                    break;
                case 'profile':
                    $this->vars['currentUser'] = $this->getter->getCurrentUser();
                    include('./templates/profile.php');
                    break;
                case 'note':
                    $this->vars['note'] = $this->getter->getNoteById(array(
                        'noteId' => $this->vars['noteId']
                    ));
                    $this->vars['comments'] = $this->getter->getComments(array(
                        'noteId' => $this->vars['noteId']
                    ));
                    include('./template/note.php');
                    break;
                case 'foreignProfile':
                    $this->vars['user'] = $this->getter->getUserById(array(
                        'userId' => $this->vars['userId']
                    ));
                    include('./templates/foreignProfile.php');
                    break;
            }
        }
    }
?>