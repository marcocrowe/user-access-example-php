<?php

namespace UserAccessExample\Repository\Session;

use UserAccessExample\DTOs\UserAccount;
use UserAccessExample\Repository\UserAccountRepository;

/**
 * Repository provides CRUD functionality for User Accounts held in Session Memory
 */
class UserAccountSessionRepository implements UserAccountRepository
{
    public function __construct()
    {
        $this->activeUser = UserAccount::construct(true, 1, "user@noreply.com", "user");
        $this->disabledUser = UserAccount::construct(false, 2, "user1@noreply.com", "user1");
        $this->users = array($this->activeUser, $this->disabledUser);
    }
    //
    // Public Constants
    //
    public const DefaultPassword = "password";
    //
    // Public Methods
    //
    public function createUserAccount(UserAccount $userAccount, string $password)
    {
        $userAccount->setId(count($this->users) + 1);
        $this->SaltPassword($password);
        array_push($this->users, $userAccount);
    }
    public function deleteUserAccount(UserAccount $userAccount)
    {
        foreach ($this->users as $key => $user) {
            if ($user->getId() == $userAccount->getId()) {
                unset($this->users[$key]);
                break;
            }
        }
    }
    public function deleteUserAccountById(int $id)
    {
        $userAccount = $this->getUserAccountById($id);
        if ($userAccount != null) {
            $this->deleteUserAccount($userAccount);
        }
    }
    public function getUserAccountById($id): ?UserAccount
    {
        foreach ($this->users as $user) {
            if ($user->getId() == $id) {
                return $user;
            }
        }
        return null;
    }
    public function getUserAccountByCredentials(string $username, string $password): ?UserAccount
    {
        foreach ($this->users as $user) {
            if (strcmp($username, $user->getUsername()) == 0 && strcmp($password, self::DefaultPassword) == 0) {
                return $user;
            }
        }
        return null;
    }
    public function saltPassword(string $password): string
    {
        return $password;
    }
    //
    // Public Methods - Users
    //
    public function getActiveUser(): UserAccount
    {
        return $this->activeUser;
    }
    public function getDisabledUser(): UserAccount
    {
        return $this->disabledUser;
    }
    /**
     * Get all User Accounts
     * @return UserAccount[] All User Accounts
     */
    public function getUserAccounts(): array
    {
        return $this->users;
    }

    public function updateUserAccount(UserAccount $userAccount)
    {
        //TODO: Implement updateUserAccount() method.
    }
    //
    // Private Fields
    //
    private UserAccount $activeUser;
    private UserAccount $disabledUser;
    private array $users;
}
