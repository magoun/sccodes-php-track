<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Greenville</title>
    </head>
    <body>
        <h1>Hello World!</h1>
        
        <dl>
            @foreach ($items as $item)
                <dt><a href="<?= $item->link; ?>" target="_blank"><?= $item->title; ?></a> - <?= date('Y-m-d', (string) $item->timestamp); ?></dt>
                <dd><?= $item->description; ?></dd>
            @endforeach
        </dl>
    </body>
</html>
