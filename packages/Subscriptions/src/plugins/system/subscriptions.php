<?php

jimport('joomla.plugin.plugin');

/**
 * Subscription system plugins. Validates the viewer subscriptions.
 *
 * @category   Anahita
 *
 * @author     Arash Sanieyan <ash@anahitapolis.com>
 * @author     Rastin Mehr <rastin@anahitapolis.com>
 * @license    GNU GPLv3 <http://www.gnu.org/licenses/gpl-3.0.html>
 *
 * @link       http://www.GetAnahita.com
 */
class PlgSystemSubscriptions extends JPlugin
{
    /**
     * onAfterRender handler.
     */
    public function onAfterRoute()
    {
        $person = get_viewer();

        if ($person->admin()) {
            return;
        }

        KService::get('repos://site/subscriptions.package');

        //if subscribe then unsubsribe
        if (
            isset($person->subscription) &&
            $person->subscription->getTimeLeft() < 0
        ) {
            $person->unsubscribe();
            $url = JRoute::_('index.php?option=com_subscriptions&view=packages');
            KService::get('application.dispatcher')->getResponse()
                                                   ->setRedirect($url)
                                                   ->send();
        }

        return;
    }
}
