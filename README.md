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

...

services:
    - FlashMessage
```

usage:
```php
protected function createComponentFlashMessage(FlashMessage $flashMessage)
{
    // $flashMessage->setTemplatePath(__DIR__ . '/templates/FlashMessage.latte');
    return $flashMessage;
}
```

usage:
```latte
{control flashMessage}
```
