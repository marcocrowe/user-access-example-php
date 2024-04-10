<?php

namespace UserAccessExample\Repository\MySQL;

use UserAccessExample\DTOs\UserAccount;
use UserAccessExample\Repository\UserAccountRepository;
use UserAccessExample\Repository\UserAccountTable;


use PDO; // TO: MC: Fix imports
/**
 * Repository provides MySQL CRUD functionality for User Accounts
 */
class UserAccountMySQLRepository implements UserAccountRepository
{
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        $this->userAccounts = array();
    }
    //
    // Public Methods
    //
    public function createUserAccount(UserAccount $userAccount, string $password): bool
    {
        $sqlCommandText = "CALL CreateUserAccount(?, ?, ?, ?, ?);";
        $sqlCommandParameters = [
            $userAccount->isActive(),
            $userAccount->getEmail(),
            $userAccount->getName(),
            self::HashPassword($password),
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
        $sqlCommandText = "CALL DeleteUserAccountById(?);";
        $sqlCommandParameters = [$userAccountId];

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $success = $pdoStatement->execute($sqlCommandParameters);
        $pdoStatement->closeCursor();
        return $success;
    }
    public function getUserAccountById(int $userAccountId): ?UserAccount
    {
        $sqlCommandText = "CALL GetUserAccountById(?);";
        $sqlCommandParameters = [$userAccountId];

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $pdoStatement->execute($sqlCommandParameters);
        $rowCount = $pdoStatement->rowCount();
        $dataRow = $pdoStatement->fetch();
        $pdoStatement->closeCursor();

        return ($rowCount > 0) ? self::Transform($dataRow) : null;
    }
    public function getUserAccountByCredentials(string $username, string $password): ?UserAccount
    {
        $sqlCommandText = "GetUserAccountByCredentials(?, ?);";
        $sqlCommandParameters = [self::HashPassword($password), $username];
        //$sqlCommandParameters = [$password, $username];

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $pdoStatement->execute($sqlCommandParameters);
        $rowCount = $pdoStatement->rowCount();
        $dataRow = $pdoStatement->fetch();
        $pdoStatement->closeCursor();

        return ($rowCount > 0) ? self::Transform($dataRow) : null;
    }
    public function getUserAccounts(): array
    {
        $sqlCommandText = "CALL GetUserAccounts();";

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $pdoStatement->execute();

        $userAccountList = array();
        foreach ($pdoStatement as $dataRow) {
            $userAccountList[] = self::Transform($dataRow);
        }
        $pdoStatement->closeCursor();

        return $userAccountList;
    }
    public function updateUserAccount(UserAccount $userAccount)
    {
        $sqlCommandText = "CALL UpdateUserAccount(?, ?, ?, ?, ?);";
        $sqlCommandParameters = [
            $userAccount->isActive(),
            $userAccount->getEmail(),
            $userAccount->getId(),
            $userAccount->getName(),
            $userAccount->getUsername()
        ];

        //self::HashPassword($password),

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $success = $pdoStatement->execute($sqlCommandParameters);
        $pdoStatement->closeCursor();
        return $success;
    }
    //
    // Protected Static Methods
    //
    protected static function hashPassword(string $password): string
    {
        return hash(self::hashAlgorithm, $password);
    }
    protected static function transform($dataRow): UserAccount
    {
        $userAccount = new UserAccount();

        $userAccount->setActive($dataRow[UserAccountTable::Active]);
        $userAccount->setEmail($dataRow[UserAccountTable::Email]);
        $userAccount->setId($dataRow[UserAccountTable::Id]);
        $userAccount->setName($dataRow[UserAccountTable::Name]);
        $userAccount->setUsername($dataRow[UserAccountTable::Username]);

        return $userAccount;
    }
    //
    // Private Fields
    //
    private PDO $connection;
    private const hashAlgorithm = "ripemd160";
    private array $userAccounts;
}
