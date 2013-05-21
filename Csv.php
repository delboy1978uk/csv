<?php
class Del_Csv
{
    /**
     * @param string $csv the file pathname
     * @return ArrayObject
     * @throws Exception
     */
    public static function toArray($csv)
    {
        if(!file_exists($csv))
        {
            throw new Exception('CSV File not found',404);
        }
        $array = new ArrayObject();
        if (($handle = fopen($csv, "r")) !== FALSE) {
            while (($data = fgetcsv($csv, 1000, ",")) !== FALSE)
            {
                $count = count($data);
                $item = new ArrayObject();
                for($x = 1; $x <= $count; $x ++)
                {
                    $item->append($data[$x]);
                }
                $array->append($item);
            }
        }
        return $array;
    }
}