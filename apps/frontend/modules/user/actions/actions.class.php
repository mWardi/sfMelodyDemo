<?php

/**
 * user actions.
 *
 * @package    sfmelodydemo
 * @subpackage user
 * @author     mourad.majdoub
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions {

    

    public function executeTwitterSignup(sfWebRequest $request) {
        // get the authenticated twitter user
        $this->user = $this->getUser()->getMelodyUser();

        // check if the user exists in the db. If exists, signin the user and redirect to homepage (or you can use a referer)
        $dbUser = UserTable::getInstance()->findOneByTwitterId($this->user->getTwitterId());
        if ($dbUser) {
            $this->getUser()->signIn($dbUser);
            $this->redirect('@homepage'); // you can redirect to a referer if is set.
        }

        if ($request->isMethod(sfWebRequest::POST)) {
            $email = $request->getParameter('email');

            // check if the email address exists in the db
            $newUser = UserTable::getInstance()->findOneByEmailAddress($email);
            if ($newUser) {
                $this->getUser()->setFlash('notice', 'This email address is already registerd to our site. Please Try to login using this email address or you can choose another address');
            } else { // create a new user
                $token = $this->getUser()->getMelodyToken();
                $newUser = new User();
                $newUser->setArray($this->user->toArray());
                $newUser->setIsActive(false);
                $newUser->setEmailAddress($email);
                $newUser->setTwitterOauthToken($token->getTokenKey());
                $newUser->setTwitterOauthTokenSecret($token->getTokenSecret());
                $newUser->save();

                $newToken = new Token();
                $newToken->setArray($token->toArray());
                $newToken->setUser($newUser);
                $newToken->save();

                $this->redirect('@homepage');
            }
        }
    }

    public function executeFacebookSignup(sfWebRequest $request) {
        // get the authenticated facebook user
        $this->user = $this->getUser()->getMelodyUser();
        $token = $this->getUser()->getMelodyToken();
        // check if the user exist in the db by his email address
        $dbUser = UserTable::getInstance()->findOneByEmailAddress($this->user->getEmailAddress());
        // if the email address is registerd, update the user fb data if it doesn't exist
        if ($dbUser) {
            if (!$dbUser->getFbId()) {
                $dbUser->setFbId($this->user->getFbId());
                $dbUser->setFbName($this->user->getFbName());
                $dbUser->setBirthday($this->user->getBirthday());
                $dbUser->save();
                $newToken = new Token();
                $newToken->setArray($token->toArray());
                $newToken->setUser($dbUser);
                $newToken->save();
            }
            $this->getUser()->signIn($dbUser);
            $this->redirect('@homepage');
        } else { // if the user doesn't exit yet, create a new user.
            $newUser = new User();
            $newUser->setArray($this->user->toArray());
            $newUser->setIsActive(false);
            $newUser->save();
            $newToken = new Token();
            $newToken->setArray($token->toArray());
            $newToken->setUser($newUser);
            $newToken->save();
            $this->redirect('@homepage');
        }
    }

}
