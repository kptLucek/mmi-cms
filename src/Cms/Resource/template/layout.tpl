<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>{adminNavigation()->title()}</title>
        {headMeta(['name' => 'description', 'content' => adminNavigation()->description()])}
    </head>
    <body>
        {messenger()}
        {content()}
    </body>
</html>