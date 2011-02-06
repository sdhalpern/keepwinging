<?php

class userActions extends sfActions {
    public function executeRegister(sfWebRequest $request) {
        $user = new User();
        $user->setRfidTag($request->getParameter('key'));

        $user = new UserForm($user);

        if ($request->getMethod() == 'POST') {

            $user->bind($request->getParameter($user->getName()),
                        $request->getFiles($user->getName()));

            if ($user->isValid()) {
                $user->save();

                $this->getUser()->setFlash('success', 'Thank you for registering!');
                $this->getUser()->setFlash('notice', 'Remember to scan your key again before taking wings.');
                $this->redirect('@dashboard');
            }
        }

        $this->user = $user;
    }
}