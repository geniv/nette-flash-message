Flash message content
=====================

Installation
------------
```sh
$ composer require geniv/nette-flash-message
```
or
```json
"geniv/nette-flash-message": ">=1.0.0"
```

require:
```json
"php": ">=7.0.0",
"nette/nette": ">=2.4.0",
"geniv/nette-general-form": ">=1.0.0"
```

Include in application
----------------------
neon configure:
```neon
...
events:
    - AjaxFlashMessageEvent
#    - AjaxFlashMessageEvent(otherNameComponent)
#    - AjaxFlashMessageEvent(otherNameComponent, otherFallBack)
```

neon configure services:
```neon
services:
    - FlashMessage
```

usage:
```php
protected function createComponentFlashMessage(FlashMessage $flashMessage)
{
    // $flashMessage->setTemplatePath(__DIR__ . '/templates/FlashMessage.latte');
    // $flashMessage->setAliasType(['danger' => 'error',]);
    return $flashMessage;
}
```

for method `setTemplatePath()` is possible use predefined latte: `FlashMessage::SWAL_PATH` or `FlashMessage::NETTE_PATH`

usage:
```latte
{control flashMessage}
```
