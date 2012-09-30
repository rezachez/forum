<?
    class Message extends Model {
        public
            $id,
            $userId,
            $content,
            $createDate;
        function __construct($args = null){
            parent::__construct($args);
            $this->validInt(array(
                'id',
                'userId'
            ));
            if (empty($this->userId)){
                $this->errors[] = 'userId empty';
            }
            if (empty($this->content)){
                $this->errors[] = 'content empty';
            }
        }
    }
?>