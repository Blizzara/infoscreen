# Infoscreen

This repo contains an (almost) HTML-only infoscreen / digital signage solution.
The solution was developed for Junction 2016.

## Setup
- A PHP-capable webserver serving HTML
    - `src/index.html` and `src/common/styles.css` contains the static part 
    - It queries `content.json` to fill in the dynamic part  
    - `index.html` uses ES6 features so it doesn't work on all browsers  
    - Different folders with partly symlinked content can be used to customize content to multiple *channels* (`/A/`, `/B/`, for example different right-side images)

- Raspberry Pi, power saving disabled and configured to open the specific *channel* website on start
    - copy `autostart` to `~/.config/lxsession/LXDE-pi/autostart` 
    - copy `xscreensaver` to `~/.xscreensaver`
    - install `xscreensaver` and `chromium-browser`
    - (Dunno if the `xscreensaver` is really needed, but at least this configuration worked)

- Webhook from Github to keep the server up to date with master
    - Webhook calls `github.pull.php`

- Status display with `log.php` and `log.html`

