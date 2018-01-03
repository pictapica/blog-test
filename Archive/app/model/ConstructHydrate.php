<?php

Trait ConstructHydrate
    {
        public function __construct($data)
        {
            if (!empty($data))
            {
                return $this->hydrate($data);
            }
        }
    
        public function hydrate(array $data)
        {
            foreach ($data as $key=>$value)
            {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }
    }
