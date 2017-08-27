<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link    http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Plugins\Actions\ProfileSummary;

use Piwik\Piwik;
use Piwik\Plugins\Live\ProfileSummary\ProfileSummaryAbstract;
use Piwik\View;

/**
 * Class MostVisitedPages
 *
 * @api
 */
class MostVisitedPages extends ProfileSummaryAbstract
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return Piwik::translate('Live_TopVisitedPages');
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        if ($this->profile['totalRevisitedPages'] > 0) {
            $view              = new View('@Actions/_profileSummary.twig');
            $view->visitorData = $this->profile;
            return $view->render();
        }

        return '';
    }

    /**
     * @inheritdoc
     */
    public function getOrder()
    {
        return 40;
    }
}