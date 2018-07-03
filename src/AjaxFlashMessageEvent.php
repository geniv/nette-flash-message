<?php declare(strict_types=1);

use GeneralForm\IEvent;
use GeneralForm\IEventContainer;
use Nette\SmartObject;


/**
 * Class AjaxFlashMessageEvent
 *
 * @author  geniv
 */
class AjaxFlashMessageEvent implements IEvent
{
    use SmartObject;

    // define constant component name
    const
        COMPONENT_NAME = 'flashMessage';

    /** @var string */
    private $componentName, $fallBack;


    /**
     * AjaxFlashMessageEvent constructor.
     *
     * @param string|null $componentName
     * @param string      $fallBack
     */
    public function __construct(string $componentName = null, $fallBack = 'this')
    {
        $this->componentName = $componentName ?: self::COMPONENT_NAME;
        $this->fallBack = $fallBack;
    }


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
            $parent[$this->componentName]->redraw($this->fallBack);
        }
    }
}
