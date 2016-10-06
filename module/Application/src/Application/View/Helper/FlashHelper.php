<?php

namespace Application\View\Helper;

use Zend\View\Helper\FlashMessenger;
use Zend\Mvc\Controller\Plugin\FlashMessenger as PluginFlashMessenger;

/**
 * FlashMessenger extension for rendering messages
 */
class FlashHelper extends FlashMessenger
{

    /**
     * Render Messages
     * @param string $namespace
     * @param array $classes
     * @param null|bool $autoEscape
     * @return string
     */
    public function render($namespace = false, array $classes = array(), $autoEscape = null)
    {
        $html = '';

        if (!$namespace) {
            $namespace = PluginFlashMessenger::NAMESPACE_DEFAULT;
        }

        $this->setMessageOpenFormat('<div%s>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                    </button>
                    <ul><li>')
            ->setMessageSeparatorString('</li><li>')
            ->setMessageCloseString('</li></ul></div>');


        // zfcuser module in operation, may send messages as well
        $html .= parent::render('zfcuser-login-form', array('alert', 'alert-dismissible', 'alert-danger'));
        $html .= parent::render('error', array('alert', 'alert-dismissible', 'alert-danger'));
        $html .= parent::render('info', array('alert', 'alert-dismissible', 'alert-info'));
        $html .= parent::render('default', array('alert', 'alert-dismissible', 'alert-warning'));
        $html .= parent::render('success', array('alert', 'alert-dismissible', 'alert-success'));
        return $html;
    }

}
