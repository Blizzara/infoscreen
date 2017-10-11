# Infoscreen

This repo contains an (almost) HTML-only infoscreen / digital signage solution.
The solution was developed for Junction 2016.

Further development and PRs are welcome!

## Setup
- A HTML- and PHP-capable webserver serving a clone of a fork of this repo
    - `src/index.html` and `src/common/styles.css` contains the static part 
    - `content.json` is queried to fill in the dynamic part
    - `index.html` uses ES6 features so it doesn't work on all browsers  
    - different folders can be used to customize content to multiple *channels* (`/A/`, `/B/`, for example different right-side images)
        - symlink `index.html` and `common` from `src`
        - add channel-specific assets, like images

- Raspberry Pi, power saving disabled and configured to open the specific *channel* website on start
    - copy `autostart` to `~/.config/lxsession/LXDE-pi/autostart` 
        - configure the website address and *channel* in `autostart`
    - copy `xscreensaver` to `~/.xscreensaver`
    - install `xscreensaver` and `chromium-browser`
    - (dunno if the `xscreensaver` is really needed, but at least this configuration worked)

- Webhook from Github to keep the server up to date with master
    - Add Github webhook that calls `github.pull.php` after each commit
    - Allows online editing of `content.json` through Github.

- Status display with `log.php` and `log.html`
