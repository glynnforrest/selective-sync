# Selective Sync

Synchronise part of a directory to another directory using various
strategies.

## Usage

```bash
./selective-sync [OPTIONS] SOURCE_DIR TARGET_DIR
```

## Options

### Strategies

Pass the `--strategy` option to change the strategy used to select
files to copy.

* `random` - randomly sampled
* `alphabetical` - in

### Limit

The `--limit` option controls how many files to sync.

* 2M - 2Mb of files
* 30% - Roughly 30% of the source directory

### File handlers

Use the `--handler` option to change the handler used to copy files.

```bash
./selective-sync

* `rsync` - Use rsync to copy files (default)
* `php` - Use native php functions to copy files (slower)

## Examples

## License

MIT, see LICENSE for details.

Copyright 2015 Glynn Forrest
