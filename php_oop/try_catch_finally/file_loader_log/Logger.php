<?php

class Logger{
    private string $logfile="log.json";

    public function log(string $message):void{
        $entry=[
            "datetime"=>(new DateTime())->format("Y-m-d H:i:s.u"),
            "message"=>$message
        ];

        $currentLogs=[];

        if(file_exists($this->logfile)){
            $json=file_get_contents($this->logfile);
            $currentLogs=json_decode($json, true);
        }

        $currentLogs[]=$entry;

        file_put_contents($this->logfile, json_encode($currentLogs, JSON_PRETTY_PRINT));
}
}


?>