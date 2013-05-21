<?php
class Del_Csv
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
        if (($handle = fopen($csv, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
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
                for($x = 1; $x <= $count; $x ++)
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
        }
        return $array;
    }
}