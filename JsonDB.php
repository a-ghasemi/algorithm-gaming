<?php

class JsonDB
{
    private $path;
    private $schema;
    private $data;

    public function __construct($db_path = '.')
    {
        $this->path = $db_path;
    }

    protected function read_table($table_name){
        $fullfilepath = $this->path.'/'.$table_name.'.json';
        if(!file_exists($fullfilepath)){
            throw new Exception("Table $table_name not found");
        }

        $content = file_get_contents($fullfilepath);
        $content = json_decode($content);

        $this->schema = $content->schema;
        $this->data = $content->data;
    }

    protected function write_table($table_name){
        $fullfilepath = $this->path.'/'.$table_name.'.json';

        $content['schema'] = $this->schema;
        $content['data'] = $content->data;

        $content = json_encode($content);
        file_put_contents($fullfilepath, $content);
    }

    protected function validation(){
        return true;
    }

    public function insert($table_name, $records){
        $this->read_table($table_name);

        if($this->validation() == false) return false;

        foreach($records as &$record){
            foreach($this->schema as $field => $rule){
                if(!isset($record[$field])){
                    if(!$rule->nullable && !isset($rule->default))
                        throw new Exception("No value provided for column $field");
                    elseif(!isset($rule['default']))
                        $record[$field] = null;
                    else
                        $record[$field] = $rule['default'];
                }
            }
        }

        foreach($records as $field=> $value){
            if(!isset($this->schema[$field])) throw new Exception("Column $field not found");
        }

        $this->data[] = $records;

        $this->write_table($table_name);
    }

    public function select($table_name, $where_clause = null){
        $this->read_table($table_name);

        if($this->validation() == false) return false;

        if(is_null($where_clause)) return $this->data;

        $results = [];
        foreach($this->data as $record){
            $res = true;
            foreach($where_clause as $key=>$val){
                if(
                    !isset($record->$key)
                    || $record->$key != $val
                ){
                    $res = false;
                    break;
                }
            }
            if($res) $results[] = $record;
        }

        return $results;
    }

    public function update(){
        $args = func_get_args();
        $table_name = $args[0];
        array_shift($args);
        foreach($args as $arg){

        }
    }

    public function delete($table_name, $where_clause){

    }

}