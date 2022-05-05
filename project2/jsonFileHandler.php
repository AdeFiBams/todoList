<?php
    require __DIR__."/jsonFileHandler.php";

    class jsonFileHandler
    {
        protected $dir;

        public function __construct(String $dir)
        {
            $this->dir = $dir;
        }

        public function save(array $data)
        {

        try {
            return file_get_contents($this->dir,json_encode($data));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        }

        public function get()
        {
            try{
            return json_decode(file_get_contents($this->dir));
            }catch(\Exception $e){
                print_r($e);
            }
            
            
        }
    }
