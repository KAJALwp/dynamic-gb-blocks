# Opry Plugin

WordPress Plugin

### Requirements

`Opry Plugin` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [NVM](https://github.com/nvm-sh/nvm) 

### Quick Start

Clone or download this repository, change its name to something else (like, say, `kg-optima`), and then you'll need to do a nine-step find and replace on the name in all the templates. **Please make sure to on capslock before start search and replace.**

1. Search for `opry-plugin` the text replace with: `kg-optima` .
2. Search for `opry_plugin` the text replace with: `kg_optima` .
3. Search for `OPRY-PLUGIN` the text replace with: `KG-OPTIMA` .
4. Search for `OPRY_PLUGIN` the text replace with: `KG_OPTIMA` .
5. Search for `Opry_Plugin` the text replace with: `Kg_Optima` .
6. Search for `Opry Plugin` the text replace with: `KG Optima` .
7. Delete `phpcbf.xml`, `phpcs.xml` and `composer.json` file from theme root directory.
8. Rename class file `opry-plugin/includes/classes/class-opry-plugin.php` to `opry-plugin/includes/classes/class-kg-optima.php` .
9. Rename plugin folder `opry-plugin` to `kg-optima` .


## Build Process

**Install**

Check for Proper node version

```bash
cd assets
nvm use
```

Install Dependency

```bash
npm install
```

**During development**

```bash
npm start
```

**Production**

```bash
npm run build
```

**Scaffold a Block**

```bash
npm run scaffold
```

You will be asked a few questions and get the base files for a block.

Steps to follow:

1. Scaffold a new block with `npm run scaffold`
2. Supply block name, eg. `Prime Demo`
3. Supply a block slug. The slug will be the name slugified, eg. `prime-demo`
4. Supply an optional description.
5. Select or search for a dashicon from provided options. eg. `smiley`.
6. Look in assets/src/blocks/prime-demo/
