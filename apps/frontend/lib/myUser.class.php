<?php

class myUser extends sfMelodyUser {

    public function getMelodyUser() {
        $user = $this->getAttribute('melody_user');
        return unserialize($user);
    }

    public function getMelodyToken() {

        return $this->getSessionMelody()->getToken();
    }

    public function getSessionMelody() {
        $melody = $this->getAttribute('melody');
//        return unserialize($user);
        return unserialize($melody);
//        return $melody;
    }

}
