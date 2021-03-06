<?php

namespace App\Models;

class Staff extends BaseModel implements InterfaceModel
{
    protected $table = 'Staff';

    public static $attributes = [
        'staffId',
        'branchId',
        'firstName',
        'lastName'
    ];

    public function getAll()
    {
        return $this->db->createQueryBuilder()
            ->select('*')
            ->from($this->table)
            ->setMaxResults(20)
            ->execute()
            ->fetchAll();
    }

    public function getOneById($id)
    {
        return $this->db->createQueryBuilder()
            ->select('*')
            ->from($this->table)
            ->where('staffId = ?')
            ->setParameter(0, $id)
            ->setMaxResults(1)
            ->execute()
            ->fetch();
    }

    public function save(array $request)
    {
        return $this->db->insert($this->table, $request);
    }

}
