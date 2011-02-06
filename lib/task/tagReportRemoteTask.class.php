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

        $tag = $arguments['tag'];

        echo "Handling $tag\r\n";


        $r = $this->executeQuery('registered', array('tag' => $tag));

        if (!$r->registered) {
            shell_exec('open http://keepwinging.com/register/' . $tag);
            exit(0);
        } else {
            $r = $this->executeQuery('report', array('tag' => $tag));
            if (!$r->success) {
                $this->fatal('Reporting failed.');
            } else {
                echo "$tag now has $r->number wings.\r\n";
            }
            exit(0);
        }
    }

    protected function executeQuery($endpoint, $parameters) {
        $url = 'http://keepwinging.com/api/' . $endpoint . '.json?';
        $url .= http_build_query($parameters);

        $x = @file_get_contents($url);
        if (!$x) {
            $this->fatal('Could not access server.');
            exit(1);
        }

        $x = @json_decode($x);
        if (!$x) {
          var_dump($x);
            $this->fatal('Comunication error.');
        }

        return $x;
    }

    protected function fatal($msg) {
        shell_exec('say "WARNING: ' . $msg . '"');
        echo $msg . "\r\n";
        exit(1);
    }
}
