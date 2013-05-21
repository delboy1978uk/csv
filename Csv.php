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
		$object = 'array()';
	}
	else
	{
		$object = 'new ArrayObject()';
	}
        if(!file_exists($csv))
        {
            throw new Exception('CSV File not found',404);
        }
        $array = $object;
        if (($handle = fopen($csv, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $count = count($data);
                $item = $object;
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
