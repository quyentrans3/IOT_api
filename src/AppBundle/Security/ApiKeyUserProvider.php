<?php
namespace AppBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityManager;

class ApiKeyUserProvider implements UserProviderInterface
{
    protected $em;
    const USER_ENTITY_NAME = 'AppBundle:User';
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function getUsernameForApiKey($apiKey)
    {
        $data = $this->em->getRepository(self::USER_ENTITY_NAME)->findOneBy(['apiKey' => $apiKey]);

        $username = (!is_null($data)) ? $data->getUserName() : null;
        return $username;
    }

    public function loadUserByUsername($username)
    {
        $user = $this->em->getRepository(self::USER_ENTITY_NAME)->findOneBy(['userName' => $username]);
        return new User(
            $username,
            null,
            // the roles for the user - you may choose to determine
            // these dynamically somehow based on the user
            array('ROLE_API')
        );
    }

    public function refreshUser(UserInterface $user)
    {
        // this is used for storing authentication in the session
        // but in this example, the token is sent in each request,
        // so authentication can be stateless. Throwing this exception
        // is proper to make things stateless
        return $user;
    }

    public function supportsClass($class)
    {
        return 'Symfony\Component\Security\Core\User\User' === $class;
    }
}