<?php
/**
 * Nethgui
 *
 * @package Core
 *
 */

/**
 * TODO: describe class
 *
 * @deprecated Substitute with the complete implementation in version Phi.
 * @package Core
 */
class Nethgui_Core_AlwaysAuthenticatedUser implements Nethgui_Core_UserInterface
{

    private $credentials;
    private $dialogs;
    private $redirect;
    
    public function __construct()
    {
        session_name('Nethgui');
        if (session_id() == '') {
            session_start();
        }

        foreach (array('credentials', 'dialogs') as $member) {
            if (isset($_SESSION[$member])) {
                $this->{$member} = unserialize($_SESSION[$member]);
            } else {
                $this->{$member} = array();
            }
        }
    }

    public function __destruct()
    {
        foreach (array('credentials', 'dialogs') as $member) {
            $_SESSION[$member] = serialize($this->{$member});
        }
    }

    public function getCredential($credentialName)
    {
        if ( ! isset($this->credentials[$credentialName])) {
            return NULL;
        }
        return $this->credentials[$credentialName];
    }

    public function getCredentials()
    {
        return array_keys($this->credentials);
    }

    public function isAuthenticated()
    {
        return TRUE;
    }

    public function setAuthenticated($status)
    {
        
    }

    public function setCredential($credentialName, $credentialValue)
    {
        $this->credentials[$credentialName] = $credentialValue;
    }

    public function hasCredential($credentialName)
    {
        return isset($this->credentials[$credentialName]);
    }

    public function showDialogBox(Nethgui_Core_ModuleInterface $module, $message, $actions = array(), $type = Nethgui_Core_DialogBox::NOTIFY_SUCCESS)
    {
        $dialog = new Nethgui_Core_DialogBox($module, $message, $actions, $type);

        if ( ! array_key_exists($dialog->getId(), $this->dialogs))
        {
            $this->dialogs[$dialog->getId()] = $dialog;
        }
    }

    public function dismissDialogBox($dialogId)
    {
        if (array_key_exists($dialogId, $this->dialogs)) {
            unset($this->dialogs[$dialogId]);
        }
    }

    public function getDialogBoxes()
    {
        return $this->dialogs;
    }

    public function setRedirect(Nethgui_Core_ModuleInterface $module, $path = array())
    {
        if ( ! isset($this->redirect))
        {
            $this->redirect = array($module, $path);
        }
    }

    public function getRedirect()
    {
        if ( ! isset($this->redirect)) {
            return NULL;
        }

        return $this->redirect;
    }

}
