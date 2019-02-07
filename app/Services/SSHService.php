<?php

namespace App\Services;


use Illuminate\Support\Arr;
use SSH;

class SSHService
{
    public static $sshDefaultDir = '/scratch/erick/apsi';
    public static $workspace;
    private $output;
    /**
     * @var array|\Illuminate\Support\Collection
     */
    public $commands = [];

    public function __construct($initDir = null)
    {
        $this->commands = collect([]);
        $initDir = $initDir !== null ? self::$sshDefaultDir . $initDir : self::$sshDefaultDir;

        self::$workspace = $initDir;
        $this->commands->push("cd $initDir");
        return $this;
    }

    public function commands($commands = [])
    {
        $commands = Arr::wrap($commands);

        $this->commands = $this->commands->merge($commands);

        return $this;
    }

    public function cd($dir)
    {
        $this->commands->push("cd $dir > /dev/null");

        return $this;
    }

    public function ls()
    {
        $directories = "";
        $this->commands->push("ls -x1 ./");

        SSH::run($this->commands->all(), function ($line) use (&$directories) {
            $directories .= $line;
        });

        $directories = array_filter(preg_split('/\r\n|\r|\n/', $directories), function ($value) {
            return $value !== '';
        });

        return $directories;
    }

    public function ls_filemanager($path)
    {
        $directories = "";
        $this->commands->push("ls -lA --full-time ." . $path);

        SSH::run($this->commands->all(), function ($line) use (&$directories) {
            $directories .= $line;
        });

        $directories = array_filter(preg_split('/\r\n|\r|\n/', $directories), function ($value) {
            return $value !== '';
        });

        return $directories;
    }

    public function getFile($file)
    {
        return SSH::getString(self::$workspace . $file);
    }

    public function run()
    {
        SSH::run($this->commands->all(), function ($line) {
            $this->output = $line.PHP_EOL;
        });
        return $this->output;
    }

    public function mkdir($dirName)
    {
        $this->commands->push("mkdir ./$dirName > /dev/null");

        return $this;
    }

    public function rename($item, $newItemPath)
    {
        $this->commands->push("mv .$item .$newItemPath");

        return $this;
    }

    public function rm($items)
    {
        $this->commands->push("rm -R " . $items);

        return $this;
    }

    public function move($item, $newPath)
    {
        $this->commands->push("mv $item $newPath");

        return $this;
    }

    public function cp($items, $newPath)
    {
        $this->commands->push("cp $items $newPath");

        return $this;
    }
}