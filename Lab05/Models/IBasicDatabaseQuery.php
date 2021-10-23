<?php

interface IBasicDatabaseQuery
{
    function getAll();
    function getByID(int $id);
    function getTotalRecord();
    function save($record);
    function delete(int $id);
}