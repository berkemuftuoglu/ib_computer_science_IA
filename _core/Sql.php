<?php

namespace _core;
class Sql
{

    private $dbname;

    public function __construct()
    {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $dbname = "Doktor";
            $root = "root";
            $passwd = "";
        } else {
            $dbname = "doktor";
            $root = "doktor";
            $passwd = "SiD(Orx9,Ugs";
        }
        $this->PDO = new \PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $root, $passwd);
    }

    public function MakeQuery($Query)
    {

        $results = $this->PDO->query($Query, \PDO::FETCH_ASSOC);
        if ($results->rowCount()) {
            foreach ($results as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }

    public function GetInfo($Query)
    {
        $result = $this->PDO->query($Query)->fetch(\PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        }
    }

    public function CountQuery($Query, $Prefix = NULL)
    {
        if (!$Prefix) $Prefix = "SELECT COUNT(id) FROM ";
        return $this->PDO->query($Prefix . " " . $Query)->fetchColumn();
    }

    public function DBCommit($Type, $Table, $Data = NULL, $Cond = NULL, $FinalCond = NULL)
    {

        foreach ($Data as $Value => $Data2) {
        
            if ($Data2) {
                $reData[$Value] = $Data2;
            }

        }

        $x = 1;
        foreach ($reData as $Value => $Data2) {
            if (isset($Data2)) {
                $Rows .= "$Value = :$Value";
                if ($x < count($reData)) {
                    $Rows .= ',';
                }
                $x++;
            }
        }
        if ($Cond) {
            $x = 1;
            foreach ($Cond as $Value => $Data2) {
                if (isset($Data2)) {
                    $qCond .= "$Value = '$Data2'";
                    if ($x < count($Cond)) {
                        $qCond .= " AND ";
                    }
                    $x++;
                }
            }
        }


        if ($Type == 'Duzenle') $TypeSql = "UPDATE";
        if ($Type == 'Sil') {
            $TypeSql = "DELETE FROM";
            $SET = NULL;
            $Rows = NULL;
        }
        if ($qCond) $qCond = "WHERE $qCond $FinalCond";
        if ($Type == 'Ekle' OR $Type == 'Duzenle') $SET = "SET";
        if ($Type == 'Ekle') {
            $TypeSql = "INSERT INTO";
            $qCond = NULL;
        }


        $query = $this->PDO->prepare("$TypeSql $Table $SET $Rows $qCond");
        if ($query->execute($reData)) {
            if ($Type == 'Duzenle' OR $Type == 'Sil') return $query->rowCount(); 
            if ($Type == 'Ekle') return $this->PDO->lastInsertId();
        } else {
            return $query->errorInfo();
        }


    }






}
