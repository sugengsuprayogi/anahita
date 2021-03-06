<?php

/** 
 * LICENSE: ##LICENSE##.
 * 
 * @category   Anahita
 *
 * @author     Arash Sanieyan <ash@anahitapolis.com>
 * @author     Rastin Mehr <rastin@anahitapolis.com>
 * @copyright  2008 - 2010 rmdStudio Inc./Peerglobe Technology Inc
 * @license    GNU GPLv3 <http://www.gnu.org/licenses/gpl-3.0.html>
 *
 * @version    SVN: $Id$
 *
 * @link       http://www.GetAnahita.com
 */
KService::get('koowa:loader')->loadIdentifier('com://site/components.domain.behavior.assignable');

/**
 * Component query.
 *
 * @category   Anahita
 *
 * @author     Arash Sanieyan <ash@anahitapolis.com>
 * @author     Rastin Mehr <rastin@anahitapolis.com>
 * @license    GNU GPLv3 <http://www.gnu.org/licenses/gpl-3.0.html>
 *
 * @link       http://www.GetAnahita.com
 */
class ComComponentsDomainQueryComponent extends AnDomainQuery
{
    /**
     * Called before the update query.
     * 
     * @param KCommandContext $context
     */
    protected function _beforeQueryUpdate(KCommandContext $context)
    {
        $this->option($this->getService('com://admin/components.domain.set.assignablecomponent')->option);
    }

    /**
     * Provides option to return assignable/nonassigable components.
     */
    protected function _beforeQuerySelect(KCommandContext $context)
    {
        if ($this->assignable) {
            $this->option($this->getService('com://admin/components.domain.set.assignablecomponent')->option);
        }
    }
}
