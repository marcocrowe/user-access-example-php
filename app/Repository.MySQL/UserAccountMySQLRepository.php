<?php

class UserAccountMySQLRepository implements UserAccountRepository
{
	function __construct(PDO $connection)
	{
		$this->connection = $connection;
		$this->userAccounts = array();
	}
	//
	//	Public Methods
	//
	public function CreateUserAccount(UserAccount $userAccount, string $password)
	{
		$sqlCommandText = "CreateUserAccount(?, ?, ?, ?, ?);";
		$sqlCommandParameters = [$userAccount->getActive(),
			$userAccount->getEmail(),
			$userAccount->getName(),
			self::HashPassword($password),
			$userAccount->getUsername()];

		$pdoStatement = $this->connection->prepare($sqlCommandText);
		$success = $pdoStatement->execute($sqlCommandParameters);
		$pdoStatement->closeCursor();
		return $success;
	}
	public function DeleteUserAccount(UserAccount $userAccount)
	{
		$this->DeleteUserAccountById($userAccount->getId());
	}
	public function DeleteUserAccountById(int $userAccountId)
	{
		$sqlCommandText = "DeleteUserAccountById(?);";
		$sqlCommandParameters = [$userAccountId];

		$pdoStatement = $this->connection->prepare($sqlCommandText);
		$success = $pdoStatement->execute($sqlCommandParameters);
		$pdoStatement->closeCursor();
		return $success;
	}
	public function GetUserAccountById(int $userAccountId): ?UserAccount
	{
		$sqlCommandText = "GetUserAccountById(?);";
		$sqlCommandParameters = [$userAccountId];

		$pdoStatement = $this->connection->prepare($sqlCommandText);
		$pdoStatement->execute($sqlCommandParameters);
		$rowCount = $pdoStatement->rowCount();
		$datarow = $pdoStatement->fetch();
		$pdoStatement->closeCursor();

		return ($rowCount > 0) ? self::Transform($datarow) : null;
	}
	public function GetUserAccountByCredentials(string $username, string $password): ?UserAccount
	{
		$sqlCommandText = "GetUserAccountByCredentials(?, ?);";
		$sqlCommandParameters = [self::HashPassword($password), $username];
		//$sqlCommandParameters = [$password, $username];

		$pdoStatement = $this->connection->prepare($sqlCommandText);
		$pdoStatement->execute($sqlCommandParameters);
		$rowCount = $pdoStatement->rowCount();
		$datarow = $pdoStatement->fetch();
		$pdoStatement->closeCursor();

		return ($rowCount > 0) ? self::Transform($datarow) : null;
	}
	public function GetUserAccounts(): array
	{
		$sqlCommandText = "GetUserAccounts();";

		$pdoStatement = $this->connection->prepare($sqlCommandText);
		$pdoStatement->execute();

		$userAccountList = array();
		foreach($pdoStatement as $datarow)
		{
			$userAccountList[] = self::Transform($datarow);
		}
		$pdoStatement->closeCursor();

		return $userAccountList;
	}
	public function UpdateUserAccount(UserAccount $userAccount, string $password)
	{
		$sqlCommandText = "UpdateUserAccount(?, ?, ?, ?, ?);";
		$sqlCommandParameters = [
			$userAccount->getActive(),
			$userAccount->getEmail(),
			$userAccount->getId(),
			$userAccount->getName(),
			$userAccount->getUsername()];

		//self::HashPassword($password),

		$pdoStatement = $this->connection->prepare($sqlCommandText);
		$success = $pdoStatement->execute($sqlCommandParameters);
		$pdoStatement->closeCursor();
		return $success;
	}
	//
	//	Protected Static Methods
	//
	protected static function HashPassword(string $password): string
	{
		return hash(self::hashAlgorithm, $password);
	}
	protected static function Transform($datarow): UserAccount
	{
		$userAccount = new UserAccount();

		$userAccount->setActive($datarow[UserAccountTable::Active]);
		$userAccount->setEmail($datarow[UserAccountTable::Email]);
		$userAccount->setId($datarow[UserAccountTable::Id]);
		$userAccount->setName($datarow[UserAccountTable::Name]);
		$userAccount->setUsername($datarow[UserAccountTable::Username]);

		return $userAccount;
	}
	//
	//	Private Fields
	//
	private PDO $connection;
	private const hashAlgorithm = "ripemd160";
}