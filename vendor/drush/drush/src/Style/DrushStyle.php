<?php

namespace Drush\Style;

use Drush\Exceptions\UserAbortException;
use Symfony\Component\Console\Style\SymfonyStyle;

class DrushStyle extends SymfonyStyle
{

    /**
     * @param string $question
     * @param array $choices
     *   If an associative array is passed, the chosen *key* is returned.
     * @param null $default
     * @return mixed
     */
    public function choice($question, array $choices, $default = null)
    {
        $choices = array_merge(['cancel' => 'Cancel'], $choices) ;
        $choices_values = array_values($choices);
        $return = parent::choice($question, $choices_values, $default);
        if ($return == 'Cancel') {
            throw new UserAbortException();
        } else {
            return array_search($return, $choices);
        }
    }

    public function confirm($question, $default = true)
    {
        // Automatically accept confirmations if the --yes argument was supplied.
        if (drush_get_context('DRUSH_AFFIRMATIVE')) {
            $this->comment($question . ': yes.');
            return true;
        } // Automatically cancel confirmations if the --no argument was supplied.
        elseif (drush_get_context('DRUSH_NEGATIVE')) {
            $this->warning($question . ': no.');
            return false;
        }

        $return = parent::confirm($question, $default);
        return $return;
    }
}
