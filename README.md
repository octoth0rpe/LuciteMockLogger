# lucite/mocklogger
A simple psr3 implementation meant for unit testing.

## Installation
`composer require lucite/mocklogger`

## Usage

Instead of writing messages somewhere, all messages are pushed onto an array (->logs). Messages are prepended with `[$LEVEL]` where $LEVEL is the all caps name of the function used to log the message. The $context arg is simply json_encoded and appended onto the message.

There are a number of handy utility functions that could be useful for testing:

- `->count()` returns the number of messages that have been logged.
- `->reset()` clears the log array.
- `->last()` returns the most recently logged message



