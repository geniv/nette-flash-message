<?php declare(strict_types=1);

use GeneralForm\ITemplatePath;


/**
 * Interface IFlashMessage
 *
 * @author  geniv
 */
interface IFlashMessage extends ITemplatePath
{

    /**
     * Set alias type.
     *
     * @param array $aliasType
     */
    public function setAliasType(array $aliasType);


    /**
     * Redraw.
     *
     * @param string $fallBack
     */
    public function redraw(string $fallBack = 'this');
}
