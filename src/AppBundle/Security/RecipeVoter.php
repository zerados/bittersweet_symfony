<?php
namespace AppBundle\Security;

use AppBundle\Entity\Recipe;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class RecipeVoter extends Voter
{
// these strings are just invented: you can use anything
    const VIEW = 'view';
    const EDIT = 'edit';

    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, array(self::VIEW, self::EDIT))) {
            return false;
        }

        // only vote on Recipe objects inside this voter
        if (!$subject instanceof Recipe) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }

        // you know $subject is a Recipe object, thanks to supports
        /** @var Recipe $recipe */
        $recipe = $subject;

        switch ($attribute) {
            case self::VIEW:
                return $this->canView($recipe, $user);
            case self::EDIT:
                return $this->canEdit($recipe, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canView(Recipe $recipe, User $user)
    {
        return true;
    }

    private function canEdit(Recipe $recipe, User $user)
    {
        return $user === $recipe->user;
    }
}