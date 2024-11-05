<?php

declare(strict_types=1);

namespace Tests\Unit;

it('should group a collection alphabetically by the first character of a property', function (): void {
    $collection = collect([
        ['name' => 'A'],
        ['name' => 'C'],
        ['name' => 'B'],
        ['name' => 'E'],
        ['name' => 'D'],
    ]);

    expect($collection->groupByFirstCharacter('name')->toArray())->toBe([
        'A' => [['name' => 'A']],
        'B' => [['name' => 'B']],
        'C' => [['name' => 'C']],
        'D' => [['name' => 'D']],
        'E' => [['name' => 'E']],
    ]);
});

it('should group a collection alphabetically by the last character of a property', function (): void {
    $collection = collect([
        ['name' => 'A'],
        ['name' => 'C'],
        ['name' => 'B'],
        ['name' => 'E'],
        ['name' => 'D'],
    ]);

    expect($collection->groupByFirstCharacter('name')->toArray())->toBe([
        'A' => [['name' => 'A']],
        'B' => [['name' => 'B']],
        'C' => [['name' => 'C']],
        'D' => [['name' => 'D']],
        'E' => [['name' => 'E']],
    ]);
});
