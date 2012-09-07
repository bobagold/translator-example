<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$app = translator();

echo $app->translateAdapter(basename(__FILE__), 'ru')->translate('hello');
echo $app->injectAtClientSide(basename(__FILE__), 'ru');

//--------------------------------------------------------------------------------------------------

function translator() {
    return new Translator\Application(
        't.translator-example.local',
        new Translator\CouchDbDriver(),
        array_key_exists('t', $_GET) ?
                Translator\Application::TRANSLATE_ON: Translator\Application::TRANSLATE_OFF
    );
}
