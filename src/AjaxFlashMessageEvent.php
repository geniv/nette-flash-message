<?php declare(strict_types=1);

use GeneralForm\IEvent;
use GeneralForm\IEventContainer;


/**
 * Class AjaxFlashMessageEvent
 *
 * @author  geniv
 */
class AjaxFlashMessageEvent implements IEvent
{
    const
        COMPONENT_NAME = 'flashMessage';


    /**
     * Update.
     *
     * @param IEventContainer $eventContainer
     * @param array           $values
     */
    public function update(IEventContainer $eventContainer, array $values)
    {
        $parent = $eventContainer->getComponent()->getParent();
        if ($parent) {
            $parent[self::COMPONENT_NAME]->redraw();
        }
    }
}
