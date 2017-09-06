<?php

namespace PHPAnt\Setup;

use \Exception;

class JSONConfigs extends BaseSetupConfigs
{
    public $jsonError    = false;
    public $jsonErrorMsg = null;
    public $configPath   = null;

    public function loadConfig($configPath) {
        $this->configPath = $configPath;

        if(file_exists($configPath) == false) throw new Exception("$configPath does not exist");

        $buffer = file_get_contents($configPath);
        $json   = json_decode($buffer);
        $this->jsonError = json_last_error();
        $this->jsonErrorMsg = json_last_error_msg();

        $this->configs = $json;

        return $json;
    }
}