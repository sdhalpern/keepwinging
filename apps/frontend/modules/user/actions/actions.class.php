<?php

class userActions extends sfActions {
    public function executeRegister(sfWebRequest $request) {
        $user = new UserForm();

        $tag = new TagForm();
        $tag->getObject()->setTag($request->getParameter('key'));

        if ($request->getMethod() == 'POST') {
            $user->bind($request->getParameter($user->getName()));
            $tag->bind($request->getParameter($tag->getName()));

            if ($user->isValid() && $tag->isValid()) {
                $tagObj = $tag->save();
                $user->getObject()->setTag($tagObj);
                $user->save();

                $this->getUser()->setFlash('success', 'Thank you for registering!');
                $this->getUser()->setFlash('notice', 'Remember to scan your key again before taking wings.');
                $this->redirect('@dashboard');
            }
        }

        $this->user = $user;
        $this->tag  = $tag;
    }
}