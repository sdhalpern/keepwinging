<?php

class tagReportRemoteTask extends sfBaseTask {

    protected function configure() {
        // add your own arguments here
        $this->addArguments(array(
            new sfCommandArgument('tag', sfCommandArgument::REQUIRED, 'The tag'),
        ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
                // add your own options here
        ));

        $this->namespace = 'tag';
        $this->name = 'reportRemote';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [tag:reportRemote|INFO] task does things.
Call it with:

  [php symfony tag:reportRemote|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {

        $tag = urlencode($arguments['tag']);
        $x = file_get_contents('http://keepwinging.com/api/registered.json?tag=' . $tag);

        if (!$x) {
            echo 'Could not access server.' . "\r\n";
            exit(1);
        }

        $x = json_decode($x);
        if (!$x) {
            echo 'Communication error.' . "\r\n";
            exit(1);
        }

        if (!$x->registered) {
            shell_exec('open http://keepwinging.com/register/' . $tag);
        }

        // add your code here
        shell_exec('say hello');
    }

}
