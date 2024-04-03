<?php

namespace UserAccessExample\Repository;

use UserAccessExample\DTOs\Group;

interface GroupRepository
{
    public function createGroup(Group $group);
    public function deleteGroup(Group $group);
    public function deleteGroupById(int $groupId);
    public function getGroupById(int $groupId): ?Group;
    public function getGroupByName(string $groupName): ?Group;
    public function getGroups(): array;
    public function updateGroup(Group $group);
}
