<?php declare(strict_types=1);

use GeneralForm\ITemplatePath;
use Nette\Localization\ITranslator;
use Nette\Application\UI\Control;


/**
 * Class FlashMessage
 *
 * @author  geniv, MartinFugess
 */
class FlashMessage extends Control implements ITemplatePath
{
    // define path for direct use, without edit latte
    const
        SWAL_PATH = __DIR__ . '/FlashMessage.latte',
        NETTE_PATH = __DIR__ . '/NetteFlashMessage.latte';

    /** @var ITranslator */
    private $translator;
    /** @var string */
    private $templatePath;


    /**
     * FlashMessage constructor.
     *
     * @param ITranslator|null $translator
     */
    public function __construct(ITranslator $translator = null)
    {
        parent::__construct();

        $this->translator = $translator;

        $this->templatePath = self::SWAL_PATH;   // set path
    }


    /**
     * Set template path.
     *
     * @param string $path
     */
    public function setTemplatePath(string $path)
    {
        $this->templatePath = $path;
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
