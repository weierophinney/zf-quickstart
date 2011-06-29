<?php

namespace Application\Model;

use Zend\Db\Table\AbstractTable,
    Exception;

class GuestbookMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof AbstractTable) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        return $this->_dbTable;
    }

    public function save(Guestbook $guestbook)
    {
        $data = array(
            'email'   => $guestbook->getEmail(),
            'comment' => $guestbook->getComment(),
            'created' => date('Y-m-d H:i:s'),
        );

        if (null === ($id = $guestbook->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Guestbook $guestbook)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $guestbook->setId($row->id)
                  ->setEmail($row->email)
                  ->setComment($row->comment)
                  ->setCreated($row->created);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Guestbook();
            $entry->setId($row->id)
                  ->setEmail($row->email)
                  ->setComment($row->comment)
                  ->setCreated($row->created);
            $entries[] = $entry;
        }
        return $entries;
    }
}

