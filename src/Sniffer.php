<?php

namespace CoenJacobs\PHPComposter_PHPCS;

use PHP_CodeSniffer\Runner;
use PHPComposter\PHPComposter\BaseAction;

class Sniffer extends BaseAction
{
    /**
     * Run PHP Code Sniffer over PHP files as pre-commit hook.
     *
     * @since 0.1.0
     */
    public function preCommit()
    {
        $files = $this->getStagedFiles('/*.php$');
        if (empty($files)) {
            return;
        }

        echo 'Running PHP CodeSniffer in ' . $this->root . PHP_EOL;
        $sniffer = new Runner();

        ob_start();
        $numErrors = $sniffer->runPHPCS();
        $output    = ob_get_clean();

        echo $output . PHP_EOL;

        if ($numErrors === 0) {
            exit(0);
        } else {
            echo 'PHP Code Sniffer found errors! Aborting Commit.' . PHP_EOL;
            exit(1);
        }
    }
}
