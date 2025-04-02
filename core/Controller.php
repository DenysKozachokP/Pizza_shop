<?php
namespace core;

class Controller{
    protected $template;
    protected $errorMessages;
    protected $confirmMessages;
    protected $warningMessages;
    public $isPost;
    public $isGet;
    public $post;
    public $get;
    public function __construct()
    {
        $action = Core::get()->actionName;
        $module = Core::get()->moduleName;
        $path = "views/{$module}/{$action}.php";
        $this->template = new Template($path);
        
        switch($_SERVER['REQUEST_METHOD']){
            case 'POST' :
                 $this->isPost = true;
                 break;
            case 'GET' :
                 $this->isGet = true;
                 break;
        }
        $this->post = new Post();
        $this->get = new Get();
        $this->errorMessages = [];
    }
    public function render($pathToView = null)
    {
        if (!empty($pathToView))
            $this->template->setTemplateFilePath($pathToView);
        return [
            'Content' => $this->template->getHTML()
        ];
    }
    public function redirect($path){
        header("Location: {$path}");
        die;
    }
    public function addErrorMessage($message = null)
    {
        $this->errorMessages[] = $message;
        $this->template->setParam('error_message', implode('</br>',$this->errorMessages));
    }
    public function addConfirmMessage($message = null)
    {
        $this->confirmMessages[] = $message;
        $this->template->setParam('confirm_message', implode('</br>',$this->confirmMessages));
    }
    public function addWarningMessage($message = null)
    {
        $this->warningMessages[] = $message;
        $this->template->setParam('warning_message', implode('</br>',$this->warningMessages));
    }
    public function clearWarningMessage()
    {
        $this->warningMessages = [];
        $this->template->setParam('warning_message',null );
    }
    public function clearConfirmMessage()
    {
        $this->errorMessages = [];
        $this->template->setParam('confirm_message',null );
    }
    public function clearErrorMessage()
    {
        $this->errorMessages = [];
        $this->template->setParam('error_message',null );
    }
    public function isErrorMessageExist(){
        return count($this->errorMessages) > 0;
    }
}

?>