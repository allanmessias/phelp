<?php
use Phelper\Command;
use Phelper\CommandList;

beforeEach(function () {
    $this->command = new Command('teste');
});

it("should add a command to the commandList and return true if it was added", function (CommandList $commandList) {
    $commandList->add($this->command);
    expect($commandList->has($this->command))->toBe(true);
})->with([
    fn() => new CommandList([new Command('help')])
]);

it("should return false if the command that was provided don't exist", function (CommandList $commandList) {
    expect($commandList->has(new Command("foo")))->toBe(false);
})->with([
    fn() => new CommandList([new Command('help')])
]);


