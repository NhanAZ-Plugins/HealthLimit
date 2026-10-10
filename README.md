# HealthLimit

HealthLimit sets a configurable maximum health for players when they join or respawn on an Axolotl-PM server.

[![Build and validate health limit plugin](https://github.com/NhanAZ-Plugins/HealthLimit/actions/workflows/build.yml/badge.svg)](https://github.com/NhanAZ-Plugins/HealthLimit/actions/workflows/build.yml)

## Features

- Apply one maximum health value to joining and respawning players.
- Restore each affected player to the configured maximum.
- Keep `config.yml` intact when its value is invalid, warn in the server log and use the default value of 2 until the configuration is corrected.

The plugin has no commands, permissions or runtime virion dependencies.

## Requirements and compatibility

The manifest requires Axolotl-PM API `5.0.0`. PHP 8.1 or newer is required by the server. The [build workflow](.github/workflows/build.yml) pins the exact server source used for PHPStan and PHAR validation. A passing build on one server revision does not establish compatibility with every Axolotl-PM 5.x release.

## Installation

Download a verified PHAR from [GitHub Releases](https://github.com/NhanAZ-Plugins/HealthLimit/releases) and place it in the server's `plugins` directory. Restart the server, then edit `plugins/HealthLimit/config.yml` and restart again to apply a different limit. Keep a copy of the previous PHAR and configuration for rollback.

```yaml
healthLimit: 2
```

`healthLimit` is a positive integer measured in health points. Invalid values are not written back to the configuration file. Correct the value and restart the server to remove the warning. HealthLimit applies the setting when a player joins or respawns. It does not change players who are already online when the plugin is enabled.

## Build and development

The [GitHub Actions workflow](.github/workflows/build.yml) uses [DevTools](https://github.com/NhanAZ/DevTools) to analyze the source at PHPStan level max, build the plugin PHAR and validate the artifact before upload. The workflow pins DevTools and the Axolotl-PM source to verified commits. Each uploaded artifact is tied to the triggering commit.

For a local source check, run PHP lint and PHPStan against the Axolotl-PM API source required by the workflow. A successful static check does not replace a server runtime test of the PHAR.

## Support and license

Report defects through [GitHub Issues](https://github.com/NhanAZ-Plugins/HealthLimit/issues) or [NhanAZ Discord](https://discord.gg/j2X83ujT6c). HealthLimit is licensed under the [GNU General Public License v3.0](LICENSE).
