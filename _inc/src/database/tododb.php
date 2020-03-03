<?php

namespace SRC;


class tododb
{
    protected $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }
    
    public function getItems($columns = [])
    {
        if(count($columns) > 0)
        {
            $str_columns = '';
            foreach($columns as $column)
            {
                if($str_columns !== '')
                {
                    $str_columns.=',';
                }
                $str_columns .= ' '.$column;
            }

            return $this->db->getAll("SELECT $str_columns FROM items");
        }
        else
        {
            return $this->db->getAll("SELECT * FROM items");
        }
        
    }

    public function getItem($id)
    {
        if(!isset($_GET['id']) || empty($_GET['id']))
        {
            return FALSE;
        }
        
        return $this->db->getOne("SELECT * FROM items WHERE id= :id", ['id' => $id]);
    }


    public function setItem($data = [])
    {
        if(count($data) > 0)
        {
            $str_columns = '';
            $str_values = '';
            foreach($data as $column => $value)
            {
                if($str_columns !== '' && $str_values !== '')
                {
                    $str_columns.=', ';
                    $str_values .=', ';
                }
                $str_columns .= ' '.$column;
                $str_values .= ' :'.$column;
            }
            $sql = "INSERT INTO items ( $str_columns ) VALUES ( $str_values )";

            return $this->db->setOne($sql, $data);
        }
    }

    public function updateItem( $data = [] )
    {
        $keys = array_keys($data);
        $str_keys = '';


        foreach ($keys as $key) 
        {
            if($key === 'id')
            {
                continue;
            }

            if($str_keys !== '')
            {
                $str_keys .= ', ' ;
            }

            $str_keys .= $key.'=:'.$key;
        }

        $sql = "UPDATE items SET $str_keys WHERE id=:id";

        return $this->db->setOne($sql, $data);
    }


    public function removeItem( $data )
    {
        if(!isset($data))
        {
            return FALSE;
        }

        $keys = array_keys($data);
        $str_keys = '';


        foreach ($keys as $key) 
        {
            if($str_keys !== '')
            {
                $str_keys .= ', ' ;
            }

            $str_keys .= $key.'=:'.$key;
        }

        $sql = "DELETE FROM items WHERE $str_keys";

        return $this->db->setOne($sql, $data);
    }
}