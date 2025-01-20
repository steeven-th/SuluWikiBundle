<div align="center">
    <img width="150" src="./doc/images/logo.png" alt="Itech World logo">
</div>

<h1 align="center">Wiki Bundle for <a href="https://sulu.io" target="_blank">Sulu</a></h1>

<h3 align="center">Developed by <a href="https://github.com/steeven-th" target="_blank">Steeven THOMAS</a></h3>
<p align="center">
    <a href="LICENSE" target="_blank">
        <img src="https://img.shields.io/badge/license-MIT-green" alt="GitHub license">
    </a>
    <a href="https://github.com/steeven-th/SuluWikiBundle/releases" target="_blank">
        <img src="https://img.shields.io/badge/release-v1.0.0-blue" alt="GitHub tag (latest SemVer)">
    </a>
    <a href="https://sulu.io/" target="_blank">
        <img src="https://img.shields.io/badge/sulu_compatibility-%3E=2.6-cyan" alt="Sulu compatibility">
    </a>
</p>
SuluWikiBundle extends the Sulu CMS to offer wiki and documentation management features similar to WikiJS

## 📂 Requirements

* PHP ^8.2
* Sulu ^2.6.*

## 🛠️ Features

* Wiki and Documentation Management
* Syntax Highlighting for Code Blocks
* Keyboard Shortcuts
* Copy Button
* Quotes
* Separators

## 📸 Screenshots
You can see [screenshots](./doc/screenshots.md) of admin and frontend.

## 🚀 Installation

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

### Step 3: Edit admin package
Edit the `assets/admin/package.json` to add the bundle to the list of bundles:
```json
{
    "dependencies": {
        "sulu-itech-world-sulu-wiki-bundle": "file:../../vendor/itech-world/sulu-wiki-bundle/public/js"
    }
}
```

Edit the `assets/admin/app.js` to add the bundle in imports:
```js
import 'sulu-itech-world-sulu-wiki-bundle';
```

In the `assets/admin/` folder, run the following command:
```bash
npm install
npm run build
```

or

```bash
yarn install
yarn build
```

### Step 4: Configure to your needs
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

### Step 5: Add blocks in your xml page template
Add the following code in your xml page template:
```xml
<xi:include href="../../../vendor/itech-world/sulu-wiki-bundle/config/templates/blocks.xml" xpointer="xmlns(sulu=http://schemas.sulu.io/template/template)
                              xpointer(/sulu:properties/sulu:block[@name='wiki_blocks'])"/>
```

You can create and use your own block template, like the [blocks.xml](./config/templates/blocks.xml) file.

## 📖 Usage
### Twig implementation
Load the HIGHLIGHT scripts and stylesheet in your base twig template in the `head` section:
```twig
{{ it_sulu_wiki_scripts() }}
```

If you want to use the default front css, load it in your base twig template in the `head` section:
```twig
{{ it_sulu_wiki_default_css() }}
```

Include the blocks in your twig front template:
```twig
{% include '@ItechWorldSuluWiki/blocks/_blocks.html.twig' %}
```

## 🎨 Customization
### Styling
SuluWikiBundle comes with a default styling. If you don't want to use the default css, you can create your own css file.
You can find the default css file in the bundle [default_css.html.twig](./templates/default_css.html.twig) template.

## 🐛 Bug and Idea

See the [open issues](https://github.com/steeven-th/SuluWikiBundle/issues) for a list of proposed
features (and known issues).

## 💰 Support me

You can buy me a coffee to support me **this plugin is 100% free**.

[Buy me a coffee](https://www.buymeacoffee.com/steeven.th)

## 👨‍💻 Contact

<a href="https://steeven-th.dev"><img src="https://avatars.githubusercontent.com/u/82022828?s=96&v=4" width="48"></a>
<a href="https://x.com/ThomasSteeven2"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/Twitter_X.png/640px-Twitter_X.png" width="48"></a>

## 📘&nbsp; License

This bundle is under the [MIT License](LICENSE).
