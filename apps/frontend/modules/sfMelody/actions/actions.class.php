<?php

require_once(sfConfig::get('sf_plugins_dir') . '/sfMelodyPlugin/modules/sfMelody/lib/BasesfMelodyActions.class.php');

/**
 * Actions class for Melody
 *
 * @author Maxime Picaud
 * @since 29 août 2010
 */
class sfMelodyActions extends BasesfMelodyActions {

    public function executeClearSession(sfWebRequest $request) {
        $this->getUser()->signOut();
        $this->redirect('@homepage');
    }

    public function executeCheckSession(sfWebRequest $request) {
        $tokens = $this->getUser()->getTokens();
        print_r('<pre>');
        print_r($tokens);
        print_r('</pre>');
        die();
    }

    public function executeFacebookConnect(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            $this->redirect('@homepage');
        }
        $this->getUser()->connect('facebook');
    }

    public function executeTwitterConnect(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            $this->redirect('@homepage');
        }
        $this->getUser()->connect('twitter');
    }

    public function executeSignup(sfWebRequest $request) {

        $melody = $this->getUser()->getSessionMelody();
        $token = $melody->getToken();

        $this->forward('user', $token->getName() . 'Signup');
    }

}