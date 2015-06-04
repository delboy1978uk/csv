<?php

namespace Del;

class Csv
{
    /**
     * @param string $csv the file pathname
     * @param bool $object if true, returns array object, otherwise a plain array
     * @return ArrayObject
     * @throws Exception
     */
    public static function toArray($csv,$object = true)
    {
        if($object == false)
        {
            $array = array();
        }
        else
        {
            $array = new ArrayObject();
        }
        if(!file_exists($csv))
        {
            throw new Exception('CSV File not found',404);
        }
        $file = new SplFileObject($csv);
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $data)
        {
            $count = count($data);
            if($object == false)
            {
                $item = array();
            }
            else
            {
                $item = new ArrayObject();
            }
            for($x = 0; $x < $count; $x ++)
            {
                if($item instanceof ArrayObject)
                {
                    $item->append($data[$x]);
                }
                else
                {
                    array_push($item,$data[$x]);
                }
            }
            if($array instanceof ArrayObject)
            {
                $array->append($item);
            }
            else
            {
                array_push($array,$item);
            }
        }
        return $array;
    }
}
