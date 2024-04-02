<?php

namespace UserAccessExample\DTOs;

class Group
{
    /**
     * Get The Group Id
     * @return int The Group Id
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * Get The Group Name
     * @return string The Group Name
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * Set The Group Id
     * @param int $id The Group Id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    /**
     * The Group Id
     */
    private int $id;
    /**
     * The Group Name
     */
    private string $name;
}


$group = new Group();

$group->setId(1);
$group->setName('Admin');

echo $group->getId(); // 1
//new line
echo $group->getName(); // Admin
