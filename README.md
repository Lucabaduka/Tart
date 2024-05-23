## Tart: Universal Endotarting Utility ![Version 2.0.0](https://img.shields.io/badge/Version-2.0.0-0099ff)

<div align="center">
  <img src="https://img.shields.io/badge/-PHP 8-777BB4?logo=php&logoColor=white&style=flat" alt="PHP 8">
</div>

## Overview
Tart is an endotarting utility for [NationStates.net](https://www.nationstates.net/), written in PHP. It allows World Assembly nations to quickly locate and endorse their regionmates, improving both their own stats as well as their region's. It also increases regional security by improving influence generation, through a more complete matrix of endorsements.

Data is collected by the processing of NationStates' daily data dumps; therefore, data will only be as current as the most recent file which NationStates makes available.

**The official Tart website is here: https://tart.calref.ca/**

## Usage

The splash page is a simple search box, where an operator may input a nation name and its region of residence. If the region is found the database, Tart will output a list of the region's World Assembly members, while dropping any that were previously endorsed by the input nation. This output can be used through two given methods:

The first method is a large blue page-opener button. In some browser, such as Chromium, you can use ctrl+click this button to cycle open all nations, opening them in new tabs. This is the fasest method, especially if the volume of missing endorsements is very high.

The second method, is a table of individual button-links which can be more easily opened in all browsers, taking you to the closest anchor with an ID on the target nation page. All button-links turn green after they've been clicked, so the operator does not lose their place.

## Installation and Configuration

- Minumum PHP Version: 8.0

1. Clone the repository into the directory of your choosing, or download the repository and upload/extract it to where it will be run.

2. If XML is not bundled in your PHP install, you will need to get it for your version number. On Debian/Ubuntu, you can grab this with `sudo apt install php8.3-xml` or whatever version of php you installed.

3. Set up a daily cron job for `tart_processor.php`, such as with Linux' `crontab` utility. NationStates finishes its update around 22:30 Pacific time, but NationStates takes a few minutes to post the new update. Setting the cron job to two and a half hours later means the data will only be old 25% of the time.

4. Set up the Apache config such as with the example  below:

```
Config will go here
```

---

## Notes, Disclosures, Etc.

I am a NationStates staff member; therefore, I am required to provide a disclaimer that operators of this tool should not assume it to be legal. It remains the player's responsibility to ensure any tools they use comply with the [Script Rules](https://forum.nationstates.net/viewtopic.php?p=16394966#p16394966).

It should be noted that endotarting is not necessarily desired or permitted by every region, and Tart cannot observe local endorsement caps or other regional policy. It is up to the operator to understand the rules and practices of their respective realms.

### History

Originally, Tart was a command on the NationStates bot, [Dot](https://calref.ca/dot/#tart_command), released in May 2022. The evolution of Tart as a browser-based utility came as the result of two strong and regretable factors. The first is that a function in a Discord bot is inherently restricted to operators with Discord accounts, limiting how many people can have access to the utility. The second is that some time in September-ish 2022, a well-known browser-based endotarting utility called Endorse the World ceased to function, as its maintainer retired from NationStates.

In order to bridge both of these issues, the `tart` command was recreated as a standalong web utility, released in [November 2022](https://forum.calref.ca/index.php?topic=9.msg3948#msg3948). As a web app, Tart turned out to be a lot easier to add features to and maintain than dealing with Discord's shifting-sands development environment. This resulted in the added operator benefit of having a greater share of uptime than:
- NationStates
- Discord
- Steam
- My bank

Eventually, Dot just redirected it's `tart` command traffic to Tart itself, and dropped most of its own code.