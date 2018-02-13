<?php declare(strict_types=1);

use Nette\Localization\ITranslator;
use Nette\Application\UI\Control;


/**
 * Class FlashMessage
 *
 * @author  geniv
 */
class FlashMessage extends Control
{
    /** @var string */
    private $templatePath;
    /** @var ITranslator */
    private $translator;


    /**
     * FlashMessage constructor.
     *
     * @param ITranslator|null $translator
     */
    public function __construct(ITranslator $translator = null)
    {
        parent::__construct();

        $this->translator = $translator;

        $this->templatePath = __DIR__ . '/FlashMessage.latte';   // set path
    }


    /**
     * Set template path.
     *
     * @param string $path
     * @return FlashMessage
     */
    public function setTemplatePath(string $path): self
    {
        $this->templatePath = $path;
        return $this;
    }


    /**
     * Redraw.
     *
     * @param string $fallBack
     * @throws \Nette\Application\AbortException
     */
    public function redraw($fallBack = 'this')
    {
        if ($this->presenter->isAjax()) {
            $this->redrawControl('flashes');
        } else {
            $this->redirect($fallBack);
        }
    }


    /**
     * Render.
     */
    public function render()
    {
        $template = $this->getTemplate();

        $template->flashes = $this->parent->template->flashes;

        $template->setTranslator($this->translator);
        $template->setFile($this->templatePath);
        $template->render();
    }
}
