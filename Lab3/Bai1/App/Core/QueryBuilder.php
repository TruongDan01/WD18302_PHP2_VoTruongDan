<?php
namespace App\Core;
use PDO;
trait QueryBuilder
{
    protected $tableName = '';
    protected $where = '';
    protected $operator = '';
    protected $selectField = '*';
    protected $limit = '';
    protected $orderBy = '';
    protected $innerJoin = '';
    protected $insert = '';
    protected $leftJoin = '';
    protected $groupBy = '';

    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function where($field, $compare, $value)
    {
        $this->operator = " WHERE";
        if (!empty($this->where)) {
            $this->operator = " AND ";
            $this->where .= "$this->operator $field $compare '$value'";
        } else {
            $this->where .= "$this->operator $field $compare '$value'";
        }
        return $this;
    }

    public function orWhere($field, $compare, $value)
    {
        $this->operator = " OR ";
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }

    public function whereLike($field, $value)
    {
        $this->operator = " AND ";
        $this->where .= "$this->operator $field LIKE '%$value%'";
        return $this;
    }

    public function limit($number, $offset = 0)
    {
        $this->limit = " LIMIT $offset, $number";
        return $this;
    }

    public function orderBy($field, $type = 'ASC')
    {
        $fileArr = array_map('trim', explode(',', $field));
        if (!empty($fileArr) && count($fileArr) >= 2) {
            $this->orderBy = " ORDER BY " . implode(', ', $fileArr);
        } else {
            $this->orderBy = " ORDER BY " . $field . " " . $type;
        }
        return $this;
    }

    public function groupBy($field)
    {
        $this->groupBy = " GROUP BY $field";
        return $this;
    }

    public function select($field = "*")
    {
        $this->selectField = $field;
        return $this;
    }

    public function join($tableName, $relationship)
    {
        $this->innerJoin .= " INNER JOIN $tableName ON $relationship";
        return $this;
    }

    public function leftJoin($tableName, $relationship)
    {
        $this->leftJoin .= " LEFT JOIN $tableName ON $relationship";
        return $this;
    }

    public function insert($data)
    {
        $tableName = $this->tableName;
        $insertStatus = $this->insertData($tableName, $data);
        return $insertStatus;
    }

    public function update($data)
    {
        $whereUpdate = trim(str_replace('WHERE', '', $this->where));
        $tableName = $this->tableName;
        $updateStatus = $this->updateData($tableName, $data, $whereUpdate);
        return $updateStatus;
    }

    public function delete()
    {
        $whereDelete = trim(str_replace('WHERE', '', $this->where));
        $tableName = $this->tableName;
        $deleteStatus = $this->deleteData($tableName, $whereDelete);
        return $deleteStatus;
    }

    public function first()
    {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName$this->innerJoin$this->leftJoin$this->where$this->groupBy$this->orderBy$this->limit";
        $query = $this->query($sqlQuery);
        $this->resetQuery();
        if (!empty($query)) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function get()
    {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName$this->innerJoin$this->leftJoin$this->where$this->groupBy$this->orderBy$this->limit";
        $query = $this->query($sqlQuery);
        $this->resetQuery();
        if (!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function resetQuery()
    {
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->limit = '';
        $this->orderBy = '';
        $this->groupBy = '';
        $this->innerJoin = '';
        $this->insert = '';
        $this->leftJoin = '';
    }
}