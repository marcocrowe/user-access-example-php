<?php

namespace UserAccessExample\Repository\MySQL;

use UserAccessExample\DTOs\Group;
use UserAccessExample\Repository\GroupRepository;

use PDO; // TO: MC: Fix imports
/**
 * Repository provides MySQL CRUD functionality for User Accounts
 */
class GroupMySQLRepository // implements GroupRepository
{
    private PDO $connection;

    /**
     * Constructor
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getGroups(): array
    {
        $sqlCommandText = "SELECT * FROM Group;";
        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $pdoStatement->execute();

        $groups = array();
        foreach ($pdoStatement->fetchAll() as $dataRow) {
            $group = new Group(
                $dataRow['id'],
                $dataRow['name'],
                $dataRow['description']
            );
            $groups[] = $group;
        }
        return $groups;
    }

    public function getGroupById(int $groupId): ?Group
    {
        $sqlCommandText = "SELECT * FROM Group Where Id = ?;";
        $sqlCommandParameters = [$groupId];

        $pdoStatement = $this->connection->prepare($sqlCommandText);
        $pdoStatement->execute($sqlCommandParameters);
        $rowCount = $pdoStatement->rowCount();
        $dataRow = $pdoStatement->fetch();
        $pdoStatement->closeCursor();

        return ($rowCount > 0) ? self::transform($dataRow) : null;
    }

    public static function transform(array $dataRow): Group
    {
        return new Group(
            $dataRow['id'],
            $dataRow['name'],
            $dataRow['description']
        );
    }
}
