<?php

namespace UserAccessExample\Repository\SqLite;

use PDO;
use UserAccessExample\DTOs\UserAccount;
use UserAccessExample\Repository\UserAccountRepository;
use UserAccessExample\Repository\UserAccountTable;

/**
 * Repository provides SqLite CRUD functionality for User Accounts
 */
class UserAccountSqLiteRepository implements UserAccountRepository
{
    private PDO $connection;
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    //
    // Public Methods
    //
    public function createUserAccount(UserAccount $userAccount, string $password): bool
    {
        $sqlCommandText = "CreateUserAccount(?, ?, ?, ?, ?);";
        $sqlCommandParameters = [
            $userAccount->isActive(),
            $userAccount->getEmail(),
            $userAccount->getName(),
            $userAccount->getUsername()
        ];

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $isSuccess = $pdoStatement->execute($sqlCommandParameters);
        $pdoStatement->closeCursor();
        return $isSuccess;
    }
    public function deleteUserAccount(UserAccount $userAccount)
    {
        $this->deleteUserAccountById($userAccount->getId());
    }
    public function deleteUserAccountById(int $userAccountId)
    {
        $sqlCommandText = "DeleteUserAccountById(?);";
        $sqlCommandParameters = [$userAccountId];

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $success = $pdoStatement->execute($sqlCommandParameters);
        $pdoStatement->closeCursor();
        return $success;
    }
    public function getUserAccountById(int $userAccountId): ?UserAccount
    {
        $sqlCommandText = "GetUserAccountById(?);";
        $sqlCommandParameters = [$userAccountId];

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $pdoStatement->execute($sqlCommandParameters);
        $rowCount = $pdoStatement->rowCount();
        $dataRow = $pdoStatement->fetch();
        $pdoStatement->closeCursor();
        if ($rowCount === 0) {
            return null;
        }
        $userAccount = new UserAccount();
        $userAccount->setId($dataRow[UserAccountTable::Id]);
        $userAccount->setActive($dataRow[UserAccountTable::Active]);
        $userAccount->setEmail($dataRow[UserAccountTable::Email]);
        $userAccount->setName($dataRow[UserAccountTable::Name]);
        $userAccount->setUsername($dataRow[UserAccountTable::Username]);
        return $userAccount;
    }
    public function getUserAccountByCredentials(string $username, string $password): ?UserAccount
    {
        $sqlCommandText = "GetUserAccountByCredentials(?, ?);";
        $sqlCommandParameters = [($password), $username];

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $pdoStatement->execute($sqlCommandParameters);
        $rowCount = $pdoStatement->rowCount();
        $dataRow = $pdoStatement->fetch();
        $pdoStatement->closeCursor();
        if ($rowCount === 0) {
            return null;
        }
        $userAccount = new UserAccount();
        $userAccount->setId($dataRow[UserAccountTable::Id]);
        $userAccount->setActive($dataRow[UserAccountTable::Active]);
        $userAccount->setEmail($dataRow[UserAccountTable::Email]);
        $userAccount->setName($dataRow[UserAccountTable::Name]);
        $userAccount->setUsername($dataRow[UserAccountTable::Username]);
        return $userAccount;
    }
    public function getUserAccounts(): array
    {
        $sqlCommandText = "GetUserAccounts();";

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $pdoStatement->execute();

        $userAccountList = array();
        foreach ($pdoStatement as $dataRow) {
            $userAccount = new UserAccount();
            $userAccount->setId($dataRow[UserAccountTable::Id]);
            $userAccount->setActive($dataRow[UserAccountTable::Active]);
            $userAccount->setEmail($dataRow[UserAccountTable::Email]);
            $userAccount->setName($dataRow[UserAccountTable::Name]);
            $userAccount->setUsername($dataRow[UserAccountTable::Username]);
            $userAccountList[] = $userAccount;
        }
        $pdoStatement->closeCursor();
        return $userAccountList;
    }
    public function updateUserAccount(UserAccount $userAccount)
    {
        $sqlCommandText = "UpdateUserAccount(?, ?, ?, ?, ?, ?);";
        $sqlCommandParameters = [
            $userAccount->isActive(),
            $userAccount->getEmail(),
            $userAccount->getId(),
            $userAccount->getName(),
            $userAccount->getUsername()
        ];

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $success = $pdoStatement->execute($sqlCommandParameters);
        $pdoStatement->closeCursor();
        return $success;
    }
}
