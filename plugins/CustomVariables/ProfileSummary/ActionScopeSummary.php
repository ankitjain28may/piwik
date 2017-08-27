<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link    http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Plugins\CustomVariables\ProfileSummary;

use Piwik\Common;
use Piwik\Piwik;
use Piwik\Plugins\CustomVariables\Model;
use Piwik\Plugins\Live\ProfileSummary\ProfileSummaryAbstract;
use Piwik\View;

/**
 * Class ActionScopeSummary
 *
 * @api
 */
class ActionScopeSummary extends ProfileSummaryAbstract
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return Piwik::translate('CustomVariables_CustomVariables') . ' ' . Piwik::translate('General_TrackingScopeAction');
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        if (empty($this->profile['customVariables']) || empty($this->profile['customVariables'][Model::SCOPE_PAGE])) {
            return '';
        }

        $view              = new View('@CustomVariables/_profileSummary.twig');
        $view->visitorData = $this->profile;
        $view->scopeName   = Piwik::translate('General_TrackingScopeAction');
        $view->variables   = $this->profile['customVariables'][Model::SCOPE_PAGE];
        return $view->render();
    }

    /**
     * @inheritdoc
     */
    public function getOrder()
    {
        return 16;
    }
}