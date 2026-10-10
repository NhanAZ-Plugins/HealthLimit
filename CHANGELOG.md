# Changelog

## 1.0.3 - 2026-10-10

- Validate `healthLimit` before passing it to Axolotl-PM.
- Use the default limit of 2 when the configured value is invalid while preserving the server owner's `config.yml` for correction.
- Add a pinned DevTools build, PHPStan max analysis and dependency update checks.

The `healthLimit` setting and API requirement are unchanged. Before upgrading, back up `config.yml` and keep the previous PHAR for rollback. If an invalid value was previously reset automatically, review the preserved setting and choose a positive integer.
