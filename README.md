#### database format
```sh
CREATE TABLE `current` (
  `UUID` varchar(128) COLLATE utf8_bin NOT NULL,
  `NAME` varchar(128) COLLATE utf8_bin NOT NULL,
  `POWER` int(128) NOT NULL,
  `MATERIAL` varchar(128) COLLATE utf8_bin NOT NULL,
  `ts` varchar(128) COLLATE utf8_bin NOT NULL,
  `SPEED` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;
```

```sh
CREATE TABLE `mynamachef` (
  `find` tinyint(1) NOT NULL,
  `nameq` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```
