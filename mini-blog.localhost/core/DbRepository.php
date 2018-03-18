<?php
/**
 * Created by PhpStorm.
 * User: satoru
 * Date: 2018/03/10
 * Time: 21:13
 */

abstract class DbRepository
{
    protected $con;

    public function __construct($con)
    {
        $this->setConnection($con);
    }

    public function setConnection($con) {
        $this->con = $con;
    }

    public function execute($sql, array $params = array()) {
        $stmt = $this->con->prepare($sql);
        $stmt->execute($params);

        return $stmt;
    }

    public function fetch($sql, array $params = array()) {
        return $this->execute($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($sql, array $params = array()) {
        return $this->execute($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }
}