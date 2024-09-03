<h1 style="text-align: center;">Sulu Wiki Bundle</h1>
SuluWikiBundle extends the Sulu CMS to offer wiki and documentation management features similar to WikiJS

## Installation

### Step 1: Download using composer
In a Symfony application run this command to install and integrate Cookie Consent bundle in your application:
```bash
composer require itech-world/sulu-wiki-bundle
```

### Step 2: Enable the bundle
When not using symfony flex, enable the bundle in bundles.php manually:
```php
return [
    // ...
    ItechWorld\SuluWikiBundle\ItechWorldSuluWikiBundle::class => ['all' => true],
];
```

### Step 3: Configure to your needs
Configure your bundle in the `config/packages/itech_world_sulu_wiki.yaml` file:
```yaml
itech_world_sulu_wiki:
    highlight:
        stylesheet: "https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.10.0/styles/atom-one-dark.min.css" # Define the url of the stylesheet for theme highlight.js, 11.10.0 by default
        script: "https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js'" # Define the url of the script for highlight.js, 11.9.0 by default
        languages: ["https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/php.min.js"] # Define the urls of the scripts for the languages you want to use, 11.9.0/languages/php.min.js by default
        copy_button: true # Define if you want to display the copy button, true by default
    quote:
        standard: "💬" # Define the standard quote icon
        info: "ℹ️" # Define the info quote icon
        warning: "⚠️" # Define the warning quote icon
        danger: "❗" # Define the danger quote icon
        success: "✅" # Define the success quote icon
```

You can find all urls in https://cdnjs.com/libraries/highlight.js
By default :
- stylesheet: "https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.10.0/styles/atom-one-dark.min.css"
- script: "https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"
- languages: ["https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/php.min.js"]

For the quote icons, you can use any emoji you want or add external icons, from [FontAwesome](https://fontawesome.com/) for example.

### Step 4: Add blocks in your xml page template
Add the following code in your xml page template:
```xml
<xi:include href="../../../vendor/itech-world/sulu-wiki-bundle/config/templates/blocks.xml" xpointer="xmlns(sulu=http://schemas.sulu.io/template/template)
                              xpointer(/sulu:properties/sulu:block[@name='wiki_blocks'])"/>
```

## Usage
### Twig implementation
Load the scripts and stylesheet in your base twig template:
```twig
{{ it_sulu_wiki_scripts() }}
```

Include the blocks in your twig front template:
```twig
{% include '@ItechWorldSuluWiki/blocks/_blocks.html.twig' %}
```

## Customization
### Styling
SuluWikiBundle comes with a default styling. A css file is available in public/styles/app.css.

To install these assets run:
```bash
bin/console assets:install
```

## Bug and Idea

See the [open issues](https://github.com/steeven-th/SuluWikiBundle/issues) for a list of proposed
features (and known issues).

## Support me

You can buy me a coffee to support me **this plugin is 100% free**.

[Buy me a coffee](https://www.buymeacoffee.com/steeven.th)

## Contact

<a href="https://steeven-th.dev"><img src="https://avatars.githubusercontent.com/u/82022828?s=96&v=4" width="48"></a>
<a href="https://x.com/ThomasSteeven2"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/Twitter_X.png/640px-Twitter_X.png" width="48"></a>
