<?php

trait JsonManipulatorTrait
{
    private $fileDirectory;

    public function save(array $data, $table = "todos")
    {
        try {
            $existingItems = $this->get($table);
            // die(var_dump($existingItems));
            $existingItems = $existingItems === null ? [] : $existingItems;
            // die(var_dump($existingItems));
            $existingItems = is_array($existingItems) ? $existingItems : [$existingItems];
            // die(var_dump($existingItems));
            $existingItems[] = $data;
            $data = [
                $table => $existingItems
            ];
            // die(var_dump($data));
            return file_put_contents($this->fileDirectory, json_encode($data));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function get($table)
    {
        try {
            $item =  (array)  json_decode(file_get_contents($this->fileDirectory));
            return is_array($item[$table]) ? $item[$table] : ($item[$table] === null ? [] : [$item[$table]]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
