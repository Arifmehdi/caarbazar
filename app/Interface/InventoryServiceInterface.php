<?php

namespace App\Interface;


interface InventoryServiceInterface extends BaseServiceInterface
{
    public function getItemByFilter($request,$id = null);
    public function getItemByUser($id);
    public function getByUserId(int $userId);
    public function getUserByRowCount(int $id);
    public function getUserByTrashedCount(int $id);
    public function bulkInactive(array $ids);
    public function bulkActive(array $ids);
}
