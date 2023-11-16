<?php
// Insert Update Delete
function pdo_mutaion($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// Get Rows
function pdo_querys($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// Get Row
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
